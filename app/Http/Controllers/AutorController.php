<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeCotroller;
use App\Http\Controllers\OperationServicesController;

class AutorController extends Controller
{
    function index($id) {

        $notifications = OperationServicesController::Notifications();
        $avatar = OperationServicesController::getPublicAutorImageProfile('avatar', $id);
        $counters =  WelcomeCotroller::counters();
        $autor = User::find($id);

        $facebook = OperationServicesController::getAutorNetwork('facebook', $id);
        $twitter = OperationServicesController::getAutorNetwork('twitter', $id);
        $instagram = OperationServicesController::getAutorNetwork('instagram', $id);
        $youtube = OperationServicesController::getAutorNetwork('youtube', $id);
        $tiktok = OperationServicesController::getAutorNetwork('tiktok', $id);
        $linkedin = OperationServicesController::getAutorNetwork('linkedin', $id);

        $autorbooks = Books::where('status', '=', '1')
            ->where('autor_id', '=', $autor->id)
            ->paginate(10);
        $autorbooks = WelcomeCotroller::booksData($autorbooks);

        return view('autor.index', compact(
            'notifications', 
            'avatar', 
            'counters', 
            'autor',
            'facebook',
            'twitter',
            'instagram',
            'youtube',
            'tiktok',
            'linkedin',
            'autorbooks'
        ));
    }
}
