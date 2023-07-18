<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaValidationController extends Controller
{
    public function index()
    {
        return view('form-with-captcha');
    }
 
    public static function capthcaFormValidate(Request $request)
    {
        return $request->validate([
            'captcha' => 'required|captcha'
        ]);
    }
 
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
