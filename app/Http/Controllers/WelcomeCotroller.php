<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\Categorie;
use App\Models\MyLibrary;
use App\Models\BookStatus;
use Illuminate\Http\Request;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class WelcomeCotroller extends Controller
{
    public function index()
    {
        $books = Books::latest()->paginate(10);
        $categorias = Categorie::all();

        $metadata = [];
        for ($i=0; $i < count($books); $i++) { 
            $book = Books::find($books[$i]['id']);
            $autor = User::find($books[$i]['autor']);
            $status = BookStatus::find($books[$i]['status']);
            $categoria = Categorie::find($books[$i]['categorie']);
            $data = [
                'book_id' => $book->id,
                'book_slug' => $book->slug,
                'book_name' => $book->name,
                'book_file' => $book->file_path,
                'autor' => $book->autor,
                'status' => $status->name,
                'categoria' => $categoria->name
            ];
            array_push($metadata, $data);

        }

        $booksBanner = $this->banner();
        $booksRecomendations = $this->recomendations();
        $booksSales = $this->booksSales();
        $offers = $this->offers();
        $counters = $this->counters();

        return view('welcome', compact(
            'books', 
            'metadata', 
            'categorias', 
            'booksBanner', 
            'booksRecomendations', 
            'booksSales', 
            'offers',
            'counters'
            ))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function banner() {

        $getBooksBanner = Books::latest()->where('status', '=', '1')->paginate(3);

        $booksBanner = [];
        for ($i=0; $i < count($getBooksBanner); $i++) { 
            $book = Books::find($getBooksBanner[$i]['id']);
            $categoria = Categorie::find($getBooksBanner[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getBooksBanner[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            
            $sale= $this->calcularPrecioConDescuento($book->price, $book->discount);
            $year = date('Y', $book->year);

            $dataBanner = [
                'book_id' => $book->id,
                'book_slug' => $book->slug,
                'book_name' => $book->name,
                'book_detail' => $book->detail,
                'book_file' => $book->file_path,
                'autor' => $book->autor,
                'year' => $year,
                'categoria' => $categoria->name,
                'portada' => $portada[0]['image_name'],
                'price' => $book->price,
                'discount' => ($book->discount > 0 ? $book->discount : NULL),
                'sale' => ($book->discount > 0 ? $sale : $book->price),
                'offer' => ($book->discount > 0 ? $book->discount : NULL)
            ];
            array_push($booksBanner, $dataBanner);
        }

        return $booksBanner;
    }

    public function recomendations() {

        $getbooksRecomendations = Books::where('status', '=', '1')->paginate(10);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;
        $booksRecomendations = [];
        for ($i=0; $i < count($getbooksRecomendations); $i++) { 
            $book = Books::find($getbooksRecomendations[$i]['id']);
            $categoria = Categorie::find($getbooksRecomendations[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getbooksRecomendations[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $sale= $this->calcularPrecioConDescuento($book->price, $book->discount);
            $year = date('Y', $book->year);
            $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $getbooksRecomendations[$i]['id'])->get();
            count($MyLibrary) > 0 ? $owner = true : $owner = false;
            $dataBanner = [
                'book_id' => $book->id,
                'book_slug' => $book->slug,
                'book_name' => $book->name,
                'book_detail' => $book->detail,
                'book_file' => $book->file_path,
                'autor' => $book->autor,
                'year' => $year,
                'categoria' => $categoria->name,
                'portada' => $portada[0]['image_name'],
                'owner' => $owner,
                'price' => $book->price,
                'discount' => ($book->discount > 0 ? $book->discount : NULL),
                'sale' => ($book->discount > 0 ? $sale : $book->price),
                'offer' => ($book->discount > 0 ? $book->discount : NULL)
            ];
            array_push($booksRecomendations, $dataBanner);
        }

        return $booksRecomendations;
    }

    public function booksSales() {

        $getbooksSales = Books::where('status', '=', '1')->where('price', '>', '0.00')->paginate(10);

        $booksSales = [];
        for ($i=0; $i < count($getbooksSales); $i++) { 
            $book = Books::find($getbooksSales[$i]['id']);
            $autor = User::find($getbooksSales[$i]['autor']);
            $categoria = Categorie::find($getbooksSales[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getbooksSales[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $sale= $this->calcularPrecioConDescuento($book->price, $book->discount);
            $year = date('Y', $book->year);
            $dataBanner = [
                'book_id' => $book->id,
                'book_slug' => $book->slug,
                'book_name' => $book->name,
                'book_detail' => $book->detail,
                'book_file' => $book->file_path,
                'autor' => $book->autor,
                'year' => $year,
                'categoria' => $categoria->name,
                'portada' => $portada[0]['image_name'],
                'price' => $book->price,
                'discount' => ($book->discount > 0 ? $book->discount : NULL),
                'sale' => ($book->discount > 0 ? $sale : $book->price),
                'offer' => ($book->discount > 0 ? $book->discount : NULL)
            ];
            array_push($booksSales, $dataBanner);
        }

        return $booksSales;
    }

    public function offers() {

        $getoffers = Books::where('status', '=', '1')->where('discount', '>', '0')->paginate(10);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;
        $offers = [];
        for ($i=0; $i < count($getoffers); $i++) { 
            $book = Books::find($getoffers[$i]['id']);
            $categoria = Categorie::find($getoffers[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getoffers[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $sale= $this->calcularPrecioConDescuento($book->price, $book->discount);
            $year = date('Y', $book->year);
            $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $getoffers[$i]['id'])->get();
            count($MyLibrary) > 0 ? $owner = true : $owner = false;
            $data = [
                'book_id' => $book->id,
                'book_slug' => $book->slug,
                'book_name' => $book->name,
                'book_detail' => $book->detail,
                'book_file' => $book->file_path,
                'autor' => $book->autor,
                'year' => $year,
                'categoria' => $categoria->name,
                'portada' => $portada[0]['image_name'],
                'owner' => $owner,
                'price' => $book->price,
                'discount' => ($book->discount > 0 ? $book->discount : NULL),
                'sale' => ($book->discount > 0 ? $sale : $book->price),
                'offer' => ($book->discount > 0 ? $book->discount : NULL)
            ];
            array_push($offers, $data);
        }
        return $offers;
    }

    static function counters() {
        $customers = DB::table('model_has_roles')->where('role_id', '=', 3)->count();
        $autors = DB::table('model_has_roles')->where('role_id', '=', 4)->count();
        $books = Books::where('status', '=', 1)->count();

        $counters = [
            'customers' => $customers,
            'books' => $books,
            'autors' => $autors
        ];
        return $counters;
    }

    static function calcularPrecioConDescuento($precio, $porcentajeDescuento) {
        // Calcula el descuento en base al porcentaje
        $descuento = $precio * ($porcentajeDescuento / 100);
        
        // Calcula el precio con descuento
        $precioConDescuento = $precio - $descuento;
        
        // Redondea el precio con descuento a dos decimales
        $precioConDescuento = round($precioConDescuento, 2);
        
        return $precioConDescuento;
    }
}
