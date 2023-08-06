<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\SocialNetworks;
use App\Models\UserUploadImages;
use Illuminate\Support\Facades\Auth;

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
            for ($i=0; $i < count($noRead); $i++) { 
                $lastOne['id'] = json_decode($noRead[$i])->id;
                $lastOne['titulo'] = json_decode($noRead[$i]['data'])->titulo;
                $lastOne['detalle'] = json_decode($noRead[$i]['data'])->detalle;
                $lastOne['created_at'] = json_decode($noRead[$i])->created_at;
                array_push($last, $lastOne);
            }

            $allOne = [];
            $all = [];
            for ($i=0; $i < count($allGet); $i++) { 
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

    static function getAuthUserImageProfile($criterio) {
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

    static function getPublicAutorImageProfile($criterio, $id) {
            
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
}
