<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
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
}
