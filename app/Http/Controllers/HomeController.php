<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($product)
    {
        $p = Product::find($product);
        if($p){
            //return view('view',['product' => $p]);
        }
        //return redirect()->route('home');
        //$count = Product::with('province.geography')->get();
        $geo = DB::select("CALL `select_product_by_geo`(@p0, @p1);");
        $result = DB::select('SELECT @p0 AS `resultCode`, @p1 AS `resultMsg`;');

        if($result[0]->resultCode !== '0')
            Log::error('select_product_by_geo -> Code : ' . $result[0]->resultCode . ', Message : ' . $result[0]->resultMsg);



//        foreach ($geo as $value){
//
//        }
        echo dd($geo);
    }
}
