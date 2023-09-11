<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\hearts;
use App\Models\Categorie;
use App\Models\MyLibrary;
use App\Mail\GeneralEmail;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\SocialNetworks;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OperationServicesController extends Controller
{
    static function Notifications()
    {
        if (Auth::check()) {
            $allGet = Notifications::where('to_id', '=', Auth::user()->id)->get();
            $noRead = Notifications::where('read_at', '=', NULL)->where('to_id', '=', Auth::user()->id)->get();
            $countNews = count($noRead);

            $lastOne = [];
            $last = [];
            for ($i = 0; $i < count($noRead); $i++) {
                $lastOne['id'] = json_decode($noRead[$i])->id;
                $lastOne['titulo'] = json_decode($noRead[$i]['data'])->titulo;
                $lastOne['detalle'] = json_decode($noRead[$i]['data'])->detalle;
                $lastOne['created_at'] = json_decode($noRead[$i])->created_at;
                array_push($last, $lastOne);
            }

            $allOne = [];
            $all = [];
            for ($i = 0; $i < count($allGet); $i++) {
                $allOne['id'] = json_decode($allGet[$i])->id;
                $allOne['titulo'] = json_decode($allGet[$i]['data'])->titulo;
                $allOne['detalle'] = json_decode($allGet[$i]['data'])->detalle;
                $allOne['created_at'] = json_decode($allGet[$i])->created_at;
                array_push($all, $allOne);
            }

            $notifications = [
                "count" => $countNews,
                "last" => $last,
                "all" => $all
            ];

        } else {
            $notifications = NULL;
        }

        return $notifications;
    }

    static function getAuthUserImageProfile($criterio)
    {
        if (Auth::check()) {
            $image = UserUploadImages::where('type', '=', $criterio)
                ->where('customer_id', '=', Auth::user()->id)
                ->where('status', '=', 1)
                ->orderBy('created_at', 'desc')
                ->first();
        } else {
            $image = false;
        }

        if ($image) {
            $return = "thumbnail/covers/" . $image->image_name;
        } else {
            if ($criterio == 'portadaPerfil') {
                $return = "assets/images/background/bgLibrary.webp";
            } else {
                $return = "assets/images/profile-default.svg";
            }
        }
        return $return;
    }

    static function getPublicAutorImageProfile($criterio, $id)
    {

        $image = UserUploadImages::where('type', '=', $criterio)
            ->where('customer_id', '=', $id)
            ->where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        //dd($image);
        if ($image) {
            $return = "thumbnail/covers/" . $image->image_name;
        } else {
            if ($criterio == 'portadaPerfil') {
                $return = "assets/images/background/bgLibrary.webp";
            } else {
                $return = "assets/images/profile-default.svg";
            }
        }
        return $return;
    }

    static function getAutorNetwork($criterio, $id)
    {
        $getSN = SocialNetworks::where('user_id', '=', $id)
            ->where('sn_network', '=', $criterio)
            ->whereNull('deleted')
            ->get();

        if (count($getSN) >= 1) {
            $response = $getSN[0]['sn_url'];
        } else {
            $response = NULL;
        }

        return $response;
    }

    static function comisionTP($precio, $porcentajeDescuento)
    {
        // Calcula el descuento en base al porcentaje
        $descuento = $precio * ($porcentajeDescuento / 100);

        // Redondea el precio con descuento a dos decimales
        $precioConDescuento = round($descuento, 2);

        return $precioConDescuento;
    }

    static function getHearts($book)
    {
        if (Auth::check()) {
            $getHearts = hearts::where("user_id", "=", Auth::user()->id)
                ->where("book_id", "=", $book)
                ->whereNull("deleted")
                ->get();
            if (count($getHearts) == 0) {
                $heart = NULL;
            } else {
                $heart = true;
            }
        } else {
            $heart = NULL;
        }
        return $heart;
    }

    static function getUserHearts()
    {
        $getHearts = hearts::where("user_id", "=", Auth::user()->id)
            ->whereNull("deleted")
            ->get();
        if (count($getHearts) == 0) {
            $getHearts = NULL;
        } else {
            for ($i = 0; $i < count($getHearts); $i++) {
                $book = Books::find($getHearts[$i]['book_id']);
                $avatar = OperationServicesController::getPublicAutorImageProfile('avatar', (isset($book->autor_id) ? $book->autor_id : NULL));
                $categoria = Categorie::find($book->categorie);
                $portada = UserUploadImages::select('image_name')->where('book_id', '=', $getHearts[$i]['book_id'])->where('type', '=', 'portada')->latest('created_at')->first();
                $sale = WelcomeCotroller::calcularPrecioConDescuento($book->price, $book->discount);
                $year = date('Y', $book->year);
                $heart = OperationServicesController::getHearts($book->id);
                $getHearts[$i]['id'] = $book->id;
                $getHearts[$i]['name'] = $book->name;
                $getHearts[$i]['file_path'] = $book->file_path;
                $getHearts[$i]['detail'] = $book->detail;
                $getHearts[$i]['year'] = $year;
                $getHearts[$i]['categoria'] = ($categoria->name ? $categoria->name : NULL);
                if (Auth::check()) {
                    $MyLibrary = MyLibrary::where('user_id', '=', Auth::user()->id)->where('book_id', '=', $getHearts[$i]['book_id'])->get();
                    count($MyLibrary) > 0 ? $owner = true : $owner = false;
                }
                $getHearts[$i]['owner'] = $owner;
                $getHearts[$i]['portada'] = $portada->image_name;
                $getHearts[$i]['price'] = $book->price;
                $getHearts[$i]['discount'] = ($book->discount > 0 ? $book->discount : NULL);
                $getHearts[$i]['sale'] = ($book->discount > 0 ? $sale : $book->price);
                $getHearts[$i]['offer'] = ($book->discount > 0 ? $book->discount : NULL);
                $getHearts[$i]['avatar'] = $avatar;
                $getHearts[$i]['heart'] = $heart;
            }
        }

        return $getHearts;
    }

    static function countHearts($book_id)
    {
        $getHearts = hearts::where('book_id', '=', $book_id)
            ->whereNull("deleted")
            ->get();

        $hearts = count($getHearts);

        return $hearts;
    }

    static function calculateNew($book_id)
    {
        $getDate = Books::find($book_id);

        //$now = date('Y-m-d H:i:s');

        //$diff = $getDate->diff($now);


        $datetime1 = date_create($getDate->created_at);
        $datetime2 = date_create(date('Y-m-d H:i:s'));
        $contador = date_diff($datetime1, $datetime2);
        $differenceFormat = '%a';
        $days = $contador->format($differenceFormat);

        $itsNew = false;
        if ($days < 30) {
            $itsNew = true;
        }

        return $itsNew;
    }

    static function sendMail($params)
    {
        $user = User::find($params['recipiente_id']);

        $objData = new \stdClass();
        $objData->nombre = $user->name;
        $objData->subject = $params['asunto'];
        $objData->mensaje = $params['mensaje'];

        if (isset($params['bcc'])) {
            Mail::to($user->email)->bcc($params['bcc'])->send(new GeneralEmail($objData));
        } else {
            Mail::to($user->email)->send(new GeneralEmail($objData));
        }
    }
}