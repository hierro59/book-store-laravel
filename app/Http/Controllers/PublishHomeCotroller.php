<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeCotroller;

class PublishHomeCotroller extends Controller
{
    public function index() {
       
        $counters =  WelcomeCotroller::counters();
        $notifications = OperationServicesController::Notifications();

        return view('publish', compact('counters', 'notifications'));
    }
}
