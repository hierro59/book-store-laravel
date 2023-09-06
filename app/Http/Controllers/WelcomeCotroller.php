<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
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
        /* $booksBanner = $this->banner();
        $booksRecomendations = $this->recomendations();
        $booksSales = $this->booksSales();
        $offers = $this->offers();*/
        $counters = $this->counters();

        $booksRecomendations = Books::where('status', '=', '1')->inRandomOrder()->paginate(10);
        $booksRecomendations = $this->booksData($booksRecomendations);

        $booksSales = Books::where('status', '=', '1')->where('price', '>', '0.00')->paginate(10);
        $booksSales = $this->booksData($booksSales);

        $booksBanner = Books::latest()->where('status', '=', '1')->paginate(3);
        $booksBanner = $this->booksData($booksBanner);

        $offers = Books::where('status', '=', '1')->where('discount', '>', '0')->paginate(10);
        $offers = $this->booksData($offers);

        $notifications = OperationServicesController::Notifications();

        $avatar = OperationServicesController::getAuthUserImageProfile('avatar');

        return view(
            'welcome',
            compact(
                'booksBanner',
                'booksRecomendations',
                'booksSales',
                'offers',
                'counters',
                'notifications',
                'avatar'
            )
        );
    }

    public function banner()
    {

        $booksBanner = Books::latest()->where('status', '=', '1')->paginate(3);
        $booksBanner = $this->booksData($booksBanner);

        return $booksBanner;
    }

    public function recomendations()
    {

        $booksRecomendations = Books::where('status', '=', '1')->paginate(10);
        $booksRecomendations = $this->booksData($booksRecomendations);

        return $booksRecomendations;
    }

    public function booksSales()
    {

        $booksSales = Books::where('status', '=', '1')->where('price', '>', '0.00')->paginate(10);
        $booksSales = $this->booksData($booksSales);

        return $booksSales;
    }

    public function offers()
    {

        $offers = Books::where('status', '=', '1')->where('discount', '>', '0')->paginate(10);
        $offers = $this->booksData($offers);

        return $offers;
    }

    static function counters()
    {
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

    static function calcularPrecioConDescuento($precio, $porcentajeDescuento)
    {
        // Calcula el descuento en base al porcentaje
        $descuento = $precio * ($porcentajeDescuento / 100);

        // Calcula el precio con descuento
        $precioConDescuento = $precio - $descuento;

        // Redondea el precio con descuento a dos decimales
        $precioConDescuento = round($precioConDescuento, 2);

        return $precioConDescuento;
    }

    static public function booksData($books)
    {
        for ($i = 0; $i < count($books); $i++) {
            $owner = false;
            $book = Books::find($books[$i]['id']);
            $avatar = OperationServicesController::getPublicAutorImageProfile('avatar', (isset($book->autor_id) ? $book->autor_id : NULL));
            $categoria = Categorie::find($books[$i]['categorie']);
            $portada = UserUploadImages::select('image_name')->where('book_id', '=', $books[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->first();
            $sale = self::calcularPrecioConDescuento($book->price, $book->discount);
            $year = date('Y', $book->year);
            $heart = OperationServicesController::getHearts($book->id);
            $countHeart = OperationServicesController::countHearts($book->id);
            $itsNew = OperationServicesController::calculateNew($book->id);
            $books[$i]['year'] = $year;
            $books[$i]['categoria'] = $categoria->name;
            if (Auth::check()) {
                $MyLibrary = MyLibrary::where('user_id', '=', Auth::user()->id)->where('book_id', '=', $books[$i]['id'])->get();
                count($MyLibrary) > 0 ? $owner = true : $owner = false;
            }
            $books[$i]['owner'] = $owner;
            $books[$i]['portada'] = $portada->image_name;
            $books[$i]['price'] = $book->price;
            $books[$i]['discount'] = ($book->discount > 0 ? $book->discount : NULL);
            $books[$i]['sale'] = ($book->discount > 0 ? $sale : $book->price);
            $books[$i]['offer'] = ($book->discount > 0 ? $book->discount : NULL);
            $books[$i]['avatar'] = $avatar;
            $books[$i]['heart'] = $heart;
            $books[$i]['hearts'] = $countHeart;
            $books[$i]['itsNew'] = ($itsNew == true ? 'Nuevo' : NULL);
        }
        return $books;
    }
}