<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibraryDiskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $path)
    {
        try {
            abort_if(
                Storage::disk('/storage/library')->exists($path),
                404,
                "The file doesn't exist. Check the path."
                );
                
            return Storage::disk('/storage/library')->response($path);
        } catch (Exception $e) {
            logger($e);
        }
        
    }
}
