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

        $type = $request['type'];
        $cur_type = $type ? $type : 'all';

        $url = URL::to('/').'?type='.$cur_type;
        $page = $request['page'];
        //$url .= $page ? '&page='.($page+1) : '&page=2';
        if($page){
            //$url .= '&page='.$page;
            Paginator::currentPageResolver(function() use ($page) {
                return $page;
            });

        }
        $product = Product::join('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->join('product_sales', 'product_sales.id', '=', 'products.product_sale_id')
            ->join('product_units', 'product_units.id', '=', 'products.product_unit_id')
            ->join('provinces', 'provinces.id', '=', 'products.province_id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->select(
                'products.id', 'products.title', 'products.subtitle', 'product_types.type',
                'product_sales.sale', 'product_units.unit', 'provinces.name as province', 'products.unit',
                'product_images.image', DB::raw('CONCAT(products.unit, " ", product_units.unit) as unit'),
                'products.amount', DB::raw('SUBSTRING(products.content,1,50) as content'), 'products.created_at'
            )
            //->toSql();
            ->paginate(5);
        $product->withPath($url)->setPageName('page');
        //dd($product);
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
