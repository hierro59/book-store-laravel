<?php

namespace App\Http\Controllers;

use App\Models\hearts;
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
        $avatarProfile = OperationServicesController::getAuthUserImageProfile('avatar');
        if (isset($request->search)) {
            $searchbooks = Books::where("name", "LIKE", "%$request->search%")->where('status', '=', '1')->paginate(20);
            if (count($searchbooks) <= 0) {
                $searchbooks = Books::where("detail", "LIKE", "%$request->search%")->where('status', '=', '1')->paginate(20);
            }
        } else {
            $searchbooks = Books::where('status', '=', '1')->inRandomOrder()->paginate(20);
        }
        $getbooks = Books::where('status', '=', '1')->inRandomOrder()->paginate(20);
        $books = WelcomeCotroller::booksData($searchbooks);

        $pay = WelcomeCotroller::booksData($getbooks);
        $notifications = OperationServicesController::Notifications();

        return view('catalog', compact('books', 'getbooks', 'notifications', 'avatarProfile', 'pay'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function detail(Books $book)
    {
        $getbooks = Books::where('status', '=', '1')->paginate(20);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;

        $books = WelcomeCotroller::booksData($getbooks);
        $pay = WelcomeCotroller::booksData($getbooks);

        $autor = User::where('id', '=', $book->autor_id)->get();
        $categoria = Categorie::find($book->categorie);
        $portada = UserUploadImages::where('book_id', '=', $book->id)->where('type', '=', 'portada')->latest('created_at')->get();
        $sale = WelcomeCotroller::calcularPrecioConDescuento($book->price, $book->discount);
        $year = date('Y', $book->year);
        $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $book->id)->get();
        count($MyLibrary) > 0 ? $owner = true : $owner = false;
        $avatar = OperationServicesController::getPublicAutorImageProfile('avatar', (isset($autor[0]['id']) ? $autor[0]['id'] : NULL));
        $avatarProfile = OperationServicesController::getAuthUserImageProfile('avatar');

        $data = [
            'book_id' => $book->id,
            'book_slug' => $book->slug,
            'book_name' => $book->name,
            'book_detail' => $book->detail,
            'autor' => $book->autor,
            'autor_id' => (isset($autor[0]['id']) ? $autor[0]['id'] : NULL),
            'year' => $year,
            'isbn' => $book->isbn,
            'categoria' => $categoria->name,
            'portada' => $portada[0]['image_name'],
            'book_file' => $book->file_path,
            'owner' => $owner,
            'price' => $book->price,
            'discount' => ($book->discount > 0 ? $book->discount : NULL),
            'sale' => ($book->discount > 0 ? $sale : $book->price),
            'offer' => ($book->discount > 0 ? $book->discount : NULL),
            'avatar' => $avatar
        ];

        $pay = [
            'id' => $book->id,
            'slug' => $book->slug,
            'name' => $book->name,
            'detail' => $book->detail,
            'autor' => $book->autor,
            'autor_id' => (isset($autor[0]['id']) ? $autor[0]['id'] : NULL),
            'year' => $year,
            'isbn' => $book->isbn,
            'categoria' => $categoria->name,
            'portada' => $portada[0]['image_name'],
            'owner' => $owner,
            'price' => $book->price,
            'discount' => ($book->discount > 0 ? $book->discount : NULL),
            'sale' => ($book->discount > 0 ? $sale : $book->price),
            'offer' => ($book->discount > 0 ? $book->discount : NULL),
            'avatar' => $avatar
        ];

        $notifications = OperationServicesController::Notifications();

        return view('detail', compact('data', 'books', 'notifications', 'avatarProfile', 'pay'));
    }

    public function wishlist()
    {
        if (Auth::check()) {
            $hearts = OperationServicesController::getUserHearts();
        } else {
            $hearts = NULL;
        }
        $getbooks = Books::where('status', '=', '1')->inRandomOrder()->paginate(20);
        $pay = WelcomeCotroller::booksData($getbooks);
        $avatarProfile = OperationServicesController::getAuthUserImageProfile('avatar');
        $notifications = OperationServicesController::Notifications();
        return view('lista-de-deseos', compact('notifications', 'avatarProfile', 'hearts', 'pay'));
    }

    public function hearts()
    {
        $now = date('Y-m-d H:i:s');
        $getHearts = hearts::where("user_id", "=", $_GET['user_id'])
            ->where("book_id", "=", $_GET['book_id'])
            ->get();
        if (count($getHearts) == 0) {
            $saveHearts = hearts::create($_GET);
        } else {
            $saveHearts = hearts::find($getHearts[0]['id']);
            if (!$saveHearts->deleted) {
                $saveHearts->deleted = $now;
                $saveHearts->save();
            } else {
                $saveHearts->deleted = NULL;
                $saveHearts->save();
            }
        }
        return $saveHearts;
    }
}