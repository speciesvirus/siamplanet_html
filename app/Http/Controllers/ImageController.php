<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    /**
     * Show image.
     *
     * @param  Request  $request
     * @param  string  $q
     * @param  int  $view
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $path = resource_path('images/'.$q);

        try{
            $file = File::get($path);

            if(!File::mimeType($path)) return route('home');
            $type = File::mimeType($path);

            $response = Response::make($file);
            $response->header("Content-Type", $type);
            return $response;
        }
        catch(\Exception $e){
            //return redirect()->route('home');
            $view = $request->input('view');
            if($view == null || $view == 1) return redirect(route('images.q').'?q=no_image_available.jpg');

            return redirect()->route('home');
        }

    }
}
