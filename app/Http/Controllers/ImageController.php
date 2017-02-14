<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $data)
    {
        $q = $data['q'];
        if($q){
            echo 'asa - >'.$q;
            $response = Response::make(File::get(resource_path('images/'.$q)));
            $response->header('Content-Type', 'image/jpeg');
            return $response;

            //return Storage::disk('images')->get('resources/images/'.$q)->header('Content-Type', 'image/png');
        }

    }
}
