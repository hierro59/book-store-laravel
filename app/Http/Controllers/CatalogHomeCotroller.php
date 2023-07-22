<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\Categorie;
use App\Models\MyLibrary;
use Illuminate\Http\Request;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\Auth;

class CatalogHomeCotroller extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $getbooks = Books::where('status', '=', '1')->inRandomOrder()->paginate(20);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;
        $books = [];
        for ($i=0; $i < count($getbooks); $i++) { 
            $book = Books::find($getbooks[$i]['id']);
            $autor = User::find($getbooks[$i]['autor']);
            $categoria = Categorie::find($getbooks[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getbooks[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $sale = WelcomeCotroller::calcularPrecioConDescuento($book->price, $book->discount);
            $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $getbooks[$i]['id'])->get();
            count($MyLibrary) > 0 ? $owner = true : $owner = false;
            $year = date('Y', $book->year);
            $dataBanner = [
                'book_id' => $book->id,
                'book_slug' => $book->slug,
                'book_name' => $book->name,
                'book_detail' => $book->detail,
                'autor' => $book->autor,
                'year' => $year,
                'isbn' => $book->isbn,
                'categoria' => $categoria->name,
                'portada' => $portada[0]['image_name'],
                'book_file' => $book->file_path,
                'owner' => $owner,
                'price' => $book->price,
                'discount' => ($book->discount > 0 ? $book->discount : NULL),
                'sale' => ($book->discount > 0 ? $sale : $book->price),
                'offer' => ($book->discount > 0 ? $book->discount : NULL)
            ];
            array_push($books, $dataBanner);
        }
        $notifications = OperationServicesController::Notifications();

        return view('catalog', compact('books', 'getbooks', 'notifications'))
        ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function detail(Books $book)
    {   
        $getbooks = Books::where('status', '=', '1')->paginate(20);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;
        $books = [];
        for ($i=0; $i < count($getbooks); $i++) { 
            $bookFor = Books::find($getbooks[$i]['id']);
            $autor = User::find($getbooks[$i]['autor']);
            $categoria = Categorie::find($getbooks[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getbooks[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $saleFor = WelcomeCotroller::calcularPrecioConDescuento($bookFor->price, $bookFor->discount);
            $year = date('Y', $bookFor->year);
            $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $getbooks[$i]['id'])->get();
            count($MyLibrary) > 0 ? $owner = true : $owner = false;
            $dataBanner = [
                'book_id' => $bookFor->id,
                'book_slug' => $bookFor->slug,
                'book_name' => $bookFor->name,
                'book_detail' => $bookFor->detail,
                'autor' => $bookFor->autor,
                'year' => $year,
                'isbn' => $book->isbn,
                'categoria' => $categoria->name,
                'portada' => $portada[0]['image_name'],
                'book_file' => $book->file_path,
                'owner' => $owner,
                'price' => $bookFor->price,
                'discount' => ($bookFor->discount > 0 ? $bookFor->discount : NULL),
                'sale' => ($bookFor->discount > 0 ? $saleFor : $bookFor->price),
                'offer' => ($bookFor->discount > 0 ? $bookFor->discount : NULL)
            ];
            array_push($books, $dataBanner);
        }
        
        $autor = User::find($book->autor);
        $categoria = Categorie::find($book->categorie);
        $portada = UserUploadImages::where('book_id', '=', $book->id)->where('type', '=', 'portada')->latest('created_at')->get();
        $sale = WelcomeCotroller::calcularPrecioConDescuento($book->price, $book->discount);
        $year = date('Y', $book->year);
        $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $book->id)->get();
        count($MyLibrary) > 0 ? $owner = true : $owner = false;
        $data = [
            'book_id' => $book->id,
            'book_slug' => $book->slug,
            'book_name' => $book->name,
            'book_detail' => $book->detail,
            'autor' => $book->autor,
            'year' => $year,
            'isbn' => $book->isbn,
            'categoria' => $categoria->name,
            'portada' => $portada[0]['image_name'],
            'book_file' => $book->file_path,
            'owner' => $owner,
            'price' => $book->price,
            'discount' => ($book->discount > 0 ? $book->discount : NULL),
            'sale' => ($book->discount > 0 ? $sale : $book->price),
            'offer' => ($book->discount > 0 ? $book->discount : NULL)
            
        ];

        $notifications = OperationServicesController::Notifications();

        return view('detail', compact('data', 'books', 'notifications'));
    }
}
