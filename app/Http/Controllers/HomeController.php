<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

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
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url = URL::to('/').'?type=';

        $type = $request['type'];
        $url .= $type ? $type : 'all';

        $page = $request['page'];
        $url .= $page ? '&page='.($page+1) : '&page=2';
        if($page){

            //$url .= '&page='.$page;
            Paginator::currentPageResolver(function() use ($page) {
                return $page;
            });

        }

        $product = Product::paginate(15);

        // if($product->currentPage() < $product->lastPage())
        $product->withPath($url);

        return view('home', ['pagination' => $product]);
    }

    /**
     * Show the only product.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($product)
    {
        $p = Product::find($product);
        if($p){
            return view('view',['product' => $p]);
        }

        return redirect()->route('home');

    }
}
