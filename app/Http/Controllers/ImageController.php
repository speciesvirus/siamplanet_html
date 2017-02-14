<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return response()->file(resource_path('images/'.$q));

// $path=Storage::get('pdf/a.jpg');
// return view('test.view', compact('path'));
        }

        //return Storage::disk('local')->get('Images/'.$q);
        //return view('home');
    }
}
