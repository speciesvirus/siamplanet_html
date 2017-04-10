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
     * @param  string  $view
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $path = base_path('photos/product/'.$q);

        if($request->view){
            if($request->view == 'avatar'){
                $path = base_path('photos/avatar/'.$q);
            }elseif ($request->view == 'news'){
                $path = base_path('photos/shares/news/'.$q);
            }
        }

        try{
            $file = File::get($path);

            if(!File::mimeType($path)) return route('home');
            $type = File::mimeType($path);

            $response = Response::make($file);
            $response->header("Content-Type", $type);
            return $response;
        }
        catch(\Exception $e){
            //$view = $request->input('view');
            return redirect(route('images.q').'?q=no_image_available.jpg');

            //return redirect()->route('home');
        }

    }
}
