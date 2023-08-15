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
        $avatarProfile = OperationServicesController::getAuthUserImageProfile('avatar');
        $getbooks = Books::where('status', '=', '1')->inRandomOrder()->paginate(20);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;
        /* $books = [];
        for ($i=0; $i < count($getbooks); $i++) { 
            $book = Books::find($getbooks[$i]['id']);
            $autor = User::where('id', '=', $getbooks[$i]['autor_id'])->get();
            $categoria = Categorie::find($getbooks[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getbooks[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $sale = WelcomeCotroller::calcularPrecioConDescuento($book->price, $book->discount);
            $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $getbooks[$i]['id'])->get();
            count($MyLibrary) > 0 ? $owner = true : $owner = false;
            $year = date('Y', $book->year);
            
            $avatar = OperationServicesController::getPublicAutorImageProfile('avatar', (isset($autor[0]['id']) ? $autor[0]['id'] : NULL));
            
            $dataBanner = [
                'id' => $book->id,
                'name' => $book->name,
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
                'offer' => ($book->discount > 0 ? $book->discount : NULL),
                'avatar' => $avatar
            ];
            array_push($books, $dataBanner);
            
        } */
        $books = WelcomeCotroller::booksData($getbooks);
        $pay = WelcomeCotroller::booksData($getbooks);

        //dd($pay);

        $notifications = OperationServicesController::Notifications();
        
        return view('catalog', compact('books', 'getbooks', 'notifications', 'avatarProfile', 'pay'))
        ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function detail(Books $book)
    {   
        $getbooks = Books::where('status', '=', '1')->paginate(20);
        isset(Auth::user()->id) ? $user_id = Auth::user()->id : $user_id = NULL;
        /* $books = [];
        for ($i=0; $i < count($getbooks); $i++) { 
            $bookFor = Books::find($getbooks[$i]['id']);
            $autor = User::where('name', '=', $getbooks[$i]['autor'])->get();
            $avatar = OperationServicesController::getPublicAutorImageProfile('avatar', (isset($autor[0]['id']) ? $autor[0]['id'] : NULL));
            $categoria = Categorie::find($getbooks[$i]['categorie']);
            $portada = UserUploadImages::where('book_id', '=', $getbooks[$i]['id'])->where('type', '=', 'portada')->latest('created_at')->get();
            $saleFor = WelcomeCotroller::calcularPrecioConDescuento($bookFor->price, $bookFor->discount);
            $year = date('Y', $bookFor->year);
            $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->where('book_id', '=', $getbooks[$i]['id'])->get();
            count($MyLibrary) > 0 ? $owner = true : $owner = false;
            $dataBanner = WelcomeCotroller::booksData($bookFor);
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
                'offer' => ($bookFor->discount > 0 ? $bookFor->discount : NULL),
                'avatar' => $avatar
            ];
            array_push($books, $dataBanner);
        } */
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
}
