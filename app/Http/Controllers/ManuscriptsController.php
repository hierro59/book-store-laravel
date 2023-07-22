<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Categorie;
use App\Mail\GeneralEmail;
use App\Models\BookStatus;
use App\Models\Manuscript;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\ManuscriptStatusChange;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\Object_;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BookController;
use Psy\VersionUpdater\Downloader\CurlDownloader;
use App\Http\Controllers\OperationServicesController;

class ManuscriptsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->roles[0]->name == 'autor') {
            $books = Manuscript::where('created_by', '=', Auth::user()->id)->paginate(5);
            $metadata = $this->autor();
            return view('manuscripts.index', compact('books', 'metadata'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $books = Manuscript::latest()->paginate(5);
            $categoria = Categorie::all();
            $metadata = [];
            for ($i=0; $i < count($books); $i++) { 
                $book = Manuscript::find($books[$i]['id']);
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
            return view('manuscripts.index', compact('books', 'metadata'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
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
        
         return view('manuscripts.create', compact('autores'))->with('categoria', $categoria);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if (isset($request->action)) {
                switch ($request->action) {
                    case 'change_status':
                        $change = Manuscript::find($request->book_id);
                        $change->status = $request->status;
                        $change->save();

                        $notification = [
                            "to_id" => $change->created_by,
                            "data" => json_encode([
                                "titulo" => "Cambio de estatus",
                                "detalle" => "Su manuscrito $change->name, ha cambiado de estatus",
                                "metadata" => [
                                ]
                            ]),
                            'created_by' => Auth::user()->id
                        ];
                        Notifications::create($notification);
                        
                        $objData = new \stdClass();
                        $objData->name = 'Felix Leon';
                        Mail::to('hierro59@gmail.com')->send(new ManuscriptStatusChange($objData));
                        break;

                    case 'update_manuscript':
                        $this->update($request);
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
                
                $uploadBook = $request->file('bookFile')->store('manuscripts');

                $save = Manuscript::create($request->all());
                
                $thisbook = Manuscript::find($save->id);
                $thisbook->file_path = $uploadBook;
                $thisbook->save();

                $objData = new \stdClass();
                $objData->nombre = Auth::user()->name;
                $objData->subject = "¡Enhorabuena! Recibimos tu manuscrito";
                $objData->mensaje = "¡Felicidades! Hemos recibido tu manuscrito. 
                Una vez que nuestro Consejo Editor lo revise, te daremos respuesta. 
                Para seguir el proceso de tu solicitud, solo debesingresar a nuestra página web textosprohibidos.shop";
                Mail::to(Auth::user()->email)->send(new GeneralEmail($objData));
            }
        } catch (Exception $e) {
            logger($e);
        }
        return redirect('manuscripts')->with('success','Manuscripts created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $book)
    {
        $thisbook = Manuscript::find($book);
        $allstatus = BookStatus::all();
        $status = BookStatus::find($thisbook->status);
        $categoria = Categorie::find($thisbook->categorie);
        $thebook = [
            'book_id' => $thisbook->id,
            'book_name' => $thisbook->name,
            'autor' => $thisbook->autor,
            'status' => $status->name,
            'categoria' => $categoria->name,
            'detalle' => $thisbook->detail,
            'file' => $thisbook->file_path,
            'allstatus' => $allstatus
        ];
        return view('manuscripts.show')->with('book', $thebook);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thisbook = Manuscript::find($id);
        $allstatus = BookStatus::all();
        $status = BookStatus::find($thisbook->status);
        $categoria = Categorie::find($thisbook->categorie);
        $categorias = Categorie::all();
        $thebook = [
            'book_id' => $thisbook->id,
            'book_slug' => $thisbook->slug,
            'book_name' => $thisbook->name,
            'autor' => $thisbook->autor,
            'coautores' => $thisbook->coautores,
            'status' => $status->name,
            'categoria_name' => $categoria->name,
            'categoria' => $thisbook->categorie,
            'detalle' => $thisbook->detail,
            'isbn' => $thisbook->isbn,
            'file' => $thisbook->file_path,
            'allstatus' => $allstatus
        ];
        
        return view('manuscripts.edit')->with(['book' => $thebook, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = [
            'name' => $request->name, 
            'autor' => $request->autor,
            'coautores' => $request->coautores,
            'detail' => $request->detail,
            'isbn' => $request->isbn,
            'categorie' => $request->categorie
        ];
        $save = Manuscript::where('id', '=', $request->book_id)->update($data);

        $notification = [
            "to_id" => Auth::user()->id,
            "data" => json_encode([
                "titulo" => "Manuscrito actualizado",
                "detalle" => "Se ha actualizado su manuscrito $request->name",
                "metadata" => [
                    "m_id" => $request->book_id
                ]
            ]),
            'created_by' => Auth::user()->id
        ];
        Notifications::create($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function autor()
    {
        $books = Manuscript::where('autor', '=', Auth::user()->name)->paginate(5);
        $metadata = [];
        for ($i=0; $i < count($books); $i++) { 
            $book = Manuscript::find($books[$i]['id']);
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

    public function download($id)
    {
        $thisbook = Manuscript::find($id);
        //dd($thisbook);
        $file = $thisbook->file_path;
        return Storage::download($file);
    }
}
