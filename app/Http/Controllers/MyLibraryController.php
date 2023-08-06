<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\Categorie;
use App\Models\MyLibrary;
use Illuminate\Http\Request;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\Auth;

class MyLibraryController extends Controller
{
    public function MyLibrary()
    {
        $user_id = Auth::user()->id;
        $MyLibrary = MyLibrary::where('user_id', '=', $user_id)->orderBy('created_at', 'DESC')->get();
        $avatarProfile = OperationServicesController::getAuthUserImageProfile('avatar');
        $books = [];
        for ($i=0; $i < count($MyLibrary); $i++) { 
            $book = Books::find($MyLibrary[$i]['book_id']);
            $autor = User::find($book->autor);
            $categoria = Categorie::find($book->categorie);
            $portada = UserUploadImages::where('book_id', '=', $book->id)->where('type', '=', 'portada')->latest('created_at')->get();
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
            ];
            array_push($books, $dataBanner);
        }
        $counters =  WelcomeCotroller::counters();
        $notifications = OperationServicesController::Notifications();
        
        return view('my-library', compact('books', 'counters', 'notifications', 'avatarProfile'));
    }
}
