<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductArea;
use App\Models\Product\ProductFacility;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductReview;
use App\Models\Product\ProductReviewImage;
use App\Models\Product\ProductSale;
use App\Models\Product\ProductSubway;
use App\Models\Product\ProductTag;
use App\Models\Product\ProductType;
use App\Models\Product\ProductUnit;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        return view('post.post');
    }
    
    public function review()
    {
        //$unit = ProductUnit::where('active', 'A')->orderBy('sort')->pluck('unit', 'id');
        return view('post.review')->with([
            'unit' => ProductUnit::ddl(),
            'type' => ProductType::ddl(),
            'sale' => ProductSale::ddl(),
            'area' => ProductArea::ddl(),
            'facility' => ProductFacility::ddl()
        ]);

    }
    
    public function product()
    {
        //$unit = ProductUnit::where('active', 'A')->orderBy('sort')->pluck('unit', 'id');
        return view('post.product')->with([
            'unit' => ProductUnit::ddl(),
            'type' => ProductType::ddl(),
            'sale' => ProductSale::ddl(),
            'area' => ProductArea::ddl(),
            'facility' => ProductFacility::ddl()
        ]);

    }

    public function image(Request $request)
    {

        $destinationPath = resource_path('images/');
        $input = $request->except('_token');
        $image_encrypted = [];

        foreach ($input as $key => $value) {
            $file = $request->file($key);
            $filename = null;
            if($file){
                $filename = $file->getClientOriginalName();
                $filename = $this->getImageName($filename);
                $upload_success = $file->move($destinationPath, $filename);
            }
            array_push($image_encrypted, ['index' => $key, 'name' => $filename]);
        }

        return response()->json(['images' => $image_encrypted] , 200);

    }

    public function getImageName($filename)
    {
        $timestamp = Carbon::now()->toDayDateTimeString();
        $randomKey = str_random(5);
        return base64_encode($filename . $timestamp . $randomKey).'.jpg';
    }

    public function post(Request $request)
    {
        $this->validator($request);

        $product = new Product();
        $product->title = $request->input('topic');
        $product->subtitle = $request->input('topic_des');
        $product->unit = $request->input('size');
        $product->price = $request->input('price');
        $product->project = $request->input('project');
        $product->complete = $request->input('year');
        $product->content = $request->input('content');
        $product->seller = $request->input('seller');
        $product->phone = $request->input('phone');

        $type = ProductType::find($request->input('type'));
        $sale = ProductSale::find($request->input('sale'));
        $unit = ProductUnit::find($request->input('size_unit'));
        $product->productType()->associate($type);
        $product->productSale()->associate($sale);
        $product->productUnit()->associate($unit);
        
        if($request->input('size_unit') == 2) $product->unit = ($request->input('size') * 4);

        $user = Auth::id();
        if ($user)
        {
            $user = User::find($user);
            $product->user()->associate($user);
        }

        // product province
        $arrGeo = $request->input('arrGeo');
        if($arrGeo){

            $province = null;

            foreach ($arrGeo as $key => $value) {
                if(stripos($value, 'Chang Wat') === 0){
                    $province = substr($value, 10);
                    break;
                }elseif (stripos($value, 'Bangkok') === 0){
                    $province = $value;
                    break;
                }
            }

            if($province){
                $pro = Province::whereEn($province)->first();
                $product->province()->associate($pro);
            }
        }

        $product->save();

        // insert product tag
        $tag = new ProductTag();
        $tag->tag1 = $request->input('tag1');
        $tag->tag2 = $request->input('tag2');
        $tag->tag3 = $request->input('tag3');
        $product->tag()->save($tag);

        $arrFile = $request->input('arrFile');
        if(!$arrFile) return response()->json("Image not found!" , 200);

        foreach ($arrFile as $key => $value) {
            $sort = ( $key + 1 );
            if($value['type'] == 'product'){
                $image = new ProductImage();
                $image->image = $value['image'];
                $image->sort = $sort;
                $product->image()->save($image);
            }else if($value['type'] == 'facility'){
                $facility = ProductFacility::find($value['id']);
                $product->assignFacility($facility, $value['image']);
            }
        }

        $arrArea = $request->input('arrArea');
        if($arrArea){
            foreach ($arrArea as $key => $value) {
                $area = ProductArea::find($value['id']);
                $area_name = $value['name'] ? $value['name'] : $request->input('topic') ;
                $product->assignArea($area, $area_name, $value['distance'], $value['lat'], $value['lng']);
            }
        }

        $arrAround = $request->input('arrAround');
        if($arrAround){
            foreach ($arrAround as $key => $value) {
                $subway = new ProductSubway();
                $subway->name = $value['name'];
                $subway->distance = $value['distance'];
                $subway->lat = $value['lat'];
                $subway->lng = $value['lng'];
                $product->subway()->save($subway);
            }
        }
        
        $arrProject = $request->input('arrProject');
        if($arrProject){
            foreach ($arrProject as $key => $value) {
                $project = new ProductReview();
                $project->name = $value['name'];
                $project->unit = $value['size'];
                if($value['unit'] == 2) $project->unit = ($value['size'] * 4);
                $project->product_unit_id = $value['unit'];
                $project->price = $value['price'];
                $project->content = $value['content'];
                $product->project()->save($project);
                foreach ($arrFile as $k => $v) {
                    if($v['type'] == 'project'){
                        if($value['index'] == $v['id']){
                            $image = new ProductReviewImage();
                            $image->image = $v['image'];
                            $project->image()->save($image);
                        }
                    }
                }
            }
        }

        return response()->json("success." , 200);
        //return response()->json($aa , 200);


        //if($img) return redirect()->back()->withInput()->withErrors(['images' => 'images is required']);

//        foreach($data['images'] as $raw){
//            $files = explode(',', $raw);
//            foreach($data['images'] as $file){
//                Storage::disk('images')->put($i, File::get($file));
//                //'required|mimes:png,gif,jpeg,txt,pdf,doc'
//                echo $file;
//                echo "-----";
//                $i++;
//            }
//        }
        //return redirect()->back()->withInput()->with(['alert-message' => 'username or password not found!', 'code' => '1']);
    }

    protected function validator(Request $data)
    {
        $rules = [
            'topic'              => 'required|min:6',
            'topic_des'          => 'required|min:6|different:topic',
            'type'               => 'required',
            'sale'               => 'required',
            'size'               => 'required|numeric',
            'size_unit'          => 'required',
            'price'              => 'required|numeric',
//            'pimg1'              => 'required|image|nullable',
            'content'            => 'required|min:6',
            'seller'             => 'required',
            'phone'              => 'required|numeric|min:9|digits_between:9,10',
        ];
        $messages = [
            'topic.required'      => 'topic is required',
            'topic.min'           => 'topic needs to have more characters',
            'topic_des.required'  => 'topic description maximum length is 20 characters',
            'topic_des.min'       => 'topic description needs to have more characters',
            'topic_des.different' => 'topic description needs to have different with topic',
            'type.required'       => 'type is required',
            'sale.required'       => 'sale is required',
            'size.required'       => 'size is required',
            'size.numeric'        => 'size need to have numeric',
            'size_unit.required'  => 'size unit is required',
            'price.required'      => 'price is required',
            'price.numeric'       => 'sale need to have numeric',
            'content.required'    => 'content is required',
            'content.min'         => 'content needs to have more characters',
        ];

        return $this->validate($data, $rules, $messages);
    }

    protected function formValidator(Request $request)
    {
        $rules = [
            'topic'              => 'required|min:6',
            'topic_des'          => 'required|min:6|different:topic',
            'type'               => 'required',
            'sale'               => 'required',
            'size'               => 'required|numeric',
            'size_unit'          => 'required',
            'price'              => 'required|numeric',
            'content'            => 'required|min:6',
            'seller'             => 'required',
            'phone'              => 'required|numeric|min:9|digits_between:9,10',
        ];
        $messages = [
            'topic.required'      => 'topic is required',
            'topic.min'           => 'topic needs to have more characters',
            'topic_des.required'  => 'topic is required',
            'topic_des.min'       => 'topic description needs to have more characters',
            'topic_des.different' => 'topic description needs to have different with topic',
            'type.required'       => 'type is required',
            'sale.required'       => 'sale is required',
            'size.required'       => 'size is required',
            'size.numeric'        => 'size need to have numeric',
            'size_unit.required'  => 'size unit is required',
            'price.required'      => 'price is required',
            'price.numeric'       => 'sale need to have numeric',
            'content.required'    => 'content is required',
            'content.min'         => 'content needs to have more characters',
        ];

        return response()->json($this->validate($request, $rules, $messages), 200);
    }
}
