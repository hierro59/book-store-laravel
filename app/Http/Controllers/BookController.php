<?php
    
namespace App\Http\Controllers;
    
use Exception;
use App\Models\User;
use App\Models\Books;
use App\Models\Categorie;
use App\Models\BookStatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\DB;
use App\Mail\ManuscriptStatusChange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ResizeController;

class bookController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles[0]->name == 'autor') {
            $books = Books::where('created_by', '=', Auth::user()->id)->paginate(5);
            $metadata = $this->autor();
            return view('books.index', compact('books', 'metadata'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $books = Books::latest()->paginate(5);
            $categoria = Categorie::all();
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
                    'autor' => $book->autor,
                    'status' => $status->name,
                    'categoria' => $categoria->name
                ];
                array_push($metadata, $data);
            }
            return view('books.index', compact('books', 'metadata'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categorie::all();
        $autors = DB::table('model_has_roles')->where('role_id', '=', 4)->get();
        $autores = [];
        for ($i=0; $i < count($autors); $i++) { 
            $findAutor = User::find($autors[$i]->model_id);
            $datos = [
                'autor_id' => $findAutor->id,
                'autor_name' => $findAutor->name
            ];
            array_push($autores, $datos);
        }
        
        return view('books.create', compact('autores'))->with('categoria', $categoria);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (isset($request->action)) {
                switch ($request->action) {
                    case 'change_status':
                        $change = Books::find($request->book_id);
                        $change->status = $request->status;
                        $change->save();
                        
                        break;

                    case 'update_book':
                        $data = [
                            'name' => $request->name, 
                            'autor' => $request->autor,
                            'coautores' => $request->coautores,
                            'detail' => $request->detail,
                            'publish_date' => $request->publish_date,
                            'isbn' => $request->isbn,
                            'price' => $request->price,
                            'discount' => $request->discount,
                            'categorie' => $request->categorie
                        ];
                        $save = Books::where('id', '=', $request->book_id)->update($data);
                        if ($request->portadaFile) {
                            ResizeController::resizeImage($request, $request->book_id);
                        }
                        break;
                    
                    default:
                        dd("estamos en default");
                        break;
                }
            } else {
                request()->validate([
                    'name' => 'required',
                    'detail' => 'required',
                    'categorie' => 'required',
                    'bookFile' => 'required',
                    'autor' => 'required',
                ]);
                
                $uploadBook = $request->file('bookFile')->store('library');

                $save = Books::create($request->all());
                
                $thisbook = Books::find($save->id);
                $thisbook->slug = Str::slug($request->name, '-') . "-" . $save->id;
                $thisbook->file_path = $uploadBook;
                $thisbook->save();
            
                if ($request->portadaFile) {
                    ResizeController::resizeImage($request, $save->id);
                }
            }
        } catch (Exception $e) {
            logger($e);
        }
        return redirect('books')->with('success','book created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        $thisbook = Books::find($book->id);
        $allstatus = BookStatus::all();
        $autor = User::find($thisbook->autor);
        $status = BookStatus::find($thisbook->status);
        $categoria = Categorie::find($thisbook->categorie);
        $cover = UserUploadImages::where('book_id', $thisbook->id)->get();
        count($cover) >= 1 ? $portada = $cover[0]['image_name'] : $portada = NULL;
        $thebook = [
            'book_id' => $thisbook->id,
            'book_slug' => $thisbook->slug,
            'book_name' => $thisbook->name,
            'autor' => $thisbook->autor,
            'year' => date('Y', strtotime($thisbook->publish_date)),
            'status' => $status->name,
            'price' => $thisbook->price,
            'discount' => $thisbook->discount,
            'categoria' => $categoria->name,
            'detalle' => $thisbook->detail,
            'image_name' => $portada,
            'file' => $thisbook->file_path,
            'allstatus' => $allstatus
        ];
        return view('books.show')->with('book', $thebook);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        $thisbook = Books::find($book->id);
        $allstatus = BookStatus::all();
        $status = BookStatus::find($thisbook->status);
        $categoria = Categorie::find($thisbook->categorie);
        $categorias = Categorie::all();
        $cover = UserUploadImages::where('book_id', $thisbook->id)->get();
        count($cover) >= 1 ? $portada = $cover[0]['image_name'] : $portada = NULL;
        $thebook = [
            'book_id' => $thisbook->id,
            'book_slug' => $thisbook->slug,
            'book_name' => $thisbook->name,
            'autor' => $thisbook->autor,
            'coautores' => $thisbook->coautores,
            'date' => date('Y-m-d', strtotime($thisbook->publish_date)),
            'status' => $status->name,
            'price' => $thisbook->price,
            'discount' => $thisbook->discount,
            'categoria_name' => $categoria->name,
            'categoria' => $thisbook->categorie,
            'detalle' => $thisbook->detail,
            'isbn' => $thisbook->isbn,
            'image_name' => $portada,
            'file' => $thisbook->file_path,
            'allstatus' => $allstatus
        ];
        return view('books.edit')->with(['book' => $thebook, 'categorias' => $categorias]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        /* request()->validate([
            'status' => 'required',
            'action' => 'required',
        ]); */
        
        dd($request);
        
        if (isset($request->action)) {
            dd('Hay accion');
        } else {
            request()->validate([
                'name' => 'required',
                'detail' => 'required',
            ]);
            $book->update($request->all());
        }
        return view('books.index')->with('success','Book updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $book->delete();
    
        return redirect('books')->with('success','Book deleted successfully');
    }

    /**
     * FUNCIONES PERSONALIZADAS
     */

    public function autor()
    {
        $books = Books::where('autor', '=', Auth::user()->name)->paginate(5);
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
                'autor' => $book->autor,
                'status' => $status->name,
                'categoria' => $categoria->name
            ];
            array_push($metadata, $data);
        }
        return $metadata;
    }

}