<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductProductArea;
use App\Models\Product\ProductProductFacility;
use App\Models\Product\ProductProject;
use App\Models\Product\ProductProjectImage;
use App\Models\Product\ProductReview;
use App\Models\Product\ProductReviewImage;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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

//        $type = $request['type'];
//        $cur_type = $type ? $type : 'all';

        $url = URL::to('/').'?';
        $page = $request['page'];
        //$url .= $page ? '&page='.($page+1) : '&page=2';

        if($page){
            //$url .= '&page='.$page;
            Paginator::currentPageResolver(function() use ($page, $request) {
                return $page;
            });
        }
        $result = Product::join('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->join('product_sales', 'product_sales.id', '=', 'products.product_sale_id')
            ->join('product_units', 'product_units.id', '=', 'products.product_unit_id')
            ->leftJoin('provinces', 'provinces.id', '=', 'products.province_id')
            ->leftJoin('product_images', function ($join) {
                $join->on('product_images.product_id', '=', 'products.id')->where('product_images.sort', '=', 1);
            })
            ->select(
                DB::raw('DISTINCT(products.id)'), 'products.title', 'products.subtitle', 'product_types.type',
                'products.seller', 'products.phone', 'products.view',
                'product_sales.sale', 'product_units.id as unit_id', 'provinces.name as province',
                'product_images.image', DB::raw('CONCAT(products.unit, " ", product_units.unit) as unit'),
                'products.price', DB::raw('SUBSTRING(products.content,1,50) as content'), 'products.created_at'
            );

        if($request->q){
            $result->where('products.title', 'like', '%'.$request->q.'%');
            $url .= '&q='.$request->q;
        }
        if($request->type){
            $result->where('product_types.type', $request->type);
            $url .= '&type='.$request->type;
        }
        if($request->price){
            $split = explode('-',$request->price);
            if(count($split) > 1){
                $result->where('products.price', '>', $split[0])->where('products.price', '<', $split[1]);
            }else{
                if(strpos($request->price, 'd')){
                    $result->where('products.price', '<', explode('d',$request->price)[0]);
                }elseif (strpos($request->price, 'u')){
                    $result->where('products.price', '>', explode('u',$request->price)[0]);
                }
            }
            $url .= '&price='.$request->price;
        }
//        if($request->size){
//            $result->where('product_types.type', $request->size);
//            $url .= '&size='.$request->type;
//        }
        if($request->sale){
            $result->where('product_sales.sale', $request->sale);
            $url .= '&sale='.$request->sale;
        }
        if($request->subway){
            $result->leftJoin('product_subways', function ($join) {
                $join->on('product_subways.product_id', '=', 'products.id');
            });
            $result->where('product_subways.distance', '<', $request->subway);
            $url .= '&price='.$request->price;
        }
        if($request->province){
            $result->where('provinces.name', $request->province);
            $url .= '&province='.$request->province;
        }
        if($request->geo){
            $result->leftJoin('geographies', 'geographies.id', '=', 'provinces.geo_id')
                ->where('geographies.name', $request->geo);
            $url .= '&geo='.$request->geo;
        }
        if($request->previous){
            $split = explode('-',$request->previous);
            $result->whereYear('products.created_at', '=', $split[0])->whereMonth('products.created_at', '=', $split[1]);
            $url .= '&previous='.$request->previous;
        }


        $product = $result->orderBy('products.id')->paginate(10);
        //dd($product);
        $product->withPath($url)->setPageName('page');


        return view('home', ['pagination' => $product])->with([
            's_type' => $request->type,
            's_price' => $request->price,
            's_size' => $request->size,
            's_sale' => $request->sale,
            's_subway' => $request->subway,
            's_province' => $request->province,
            's_keyword' => $request->q,
            ]);
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
            //!* update view
            $view = ++$p->view;
            $p->view = $view;
            $p->save();
            
            $product = Product::selectOnProduct($p->id);
            $facility = ProductProductFacility::selectOnProduct($p->id);
            $image = ProductImage::selectOnProduct($p->id);
            $area = ProductProductArea::selectOnProduct($p->id);
//dd($product);

            $param = [
                'product' => $product[0]['attributes'],
                'product_img' => $image,
                'product_facility' => $facility,
                'product_area' => $area,
            ];

            if($p->product_type_id === 5){
                $review = ProductReview::selectOnProduct($p->id);
                $reviewId = [];
                foreach ($review as $key => $value){
                    array_push($reviewId, $value['attributes']['id']);
                }
                $review_img = ProductReviewImage::selectOnProduct($reviewId);
                $param['product_review']  = $review;
                $param['product_review_image']  = $review_img;
                return view('review', $param);
            }

            return view('view', $param);
        }

        return redirect()->route('home');

    }

    /**
     * Show the only product.
     *
     * @return \Illuminate\Http\Response
     */
    public function phone(Request $request)
    {
        $product = Product::find($request['id']);
        $phone_count = ++$product->phone_view;
        $product->phone_view = $phone_count;
        $product->save();

        return response()->json(['phone' => $product['phone']], 200);
    }
}
