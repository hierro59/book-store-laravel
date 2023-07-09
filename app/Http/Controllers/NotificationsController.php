<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function update(Request $request)
    {
        //logger($request);
        $now = date('Y-m-d');
        $notifications = Notifications::where('to_id', '=', $request->user_id)->get();
        for ($i=0; $i < count($notifications); $i++) { 
            $save = Notifications::find($notifications[$i]['id']);
            $save->read_at = $now;
            $save->save();
        }
        return true;
    }
}
