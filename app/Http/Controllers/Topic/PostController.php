<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductArea;
use App\Models\Product\ProductFacility;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductSale;
use App\Models\Product\ProductTag;
use App\Models\Product\ProductType;
use App\Models\Product\ProductUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function index()
    {
        //$unit = ProductUnit::where('active', 'A')->orderBy('sort')->pluck('unit', 'id');
        return view('post')->with([
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
             $filename = $file->getClientOriginalName();
             $timestamp = Carbon::now()->toDayDateTimeString();
             $randomKey = str_random(5);
             $filename = base64_encode($filename . $timestamp . $randomKey).'.jpg';
             $upload_success = $file->move($destinationPath, $filename);
         }

        return response()->json(['images' => $image_encrypted] , 200);

    }

    public function post(Request $request)
    {
        $this->validator($request);

        $product = new Product();
        $product->title = $request->input('topic');
        $product->subtitle = $request->input('topic_des');
        $product->unit = $request->input('size');
        $product->amount = $request->input('price');
        $product->name = $request->input('project');
        $product->complete = $request->input('year');
        $product->content = $request->input('content');

        $type = ProductType::find($request->input('type'));
        $sale = ProductSale::find($request->input('sale'));
        $unit = ProductUnit::find($request->input('size_unit'));
        $product->productType()->associate($type);
        $product->productSale()->associate($sale);
        $product->productUnit()->associate($unit);
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
            if($value['type'] == 'product'){
                $image = new ProductImage();
                $image->image = $value['image'];
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
                $product->assignArea($area, $area_name, $value['lat'], $value['lng']);
            }
        }

        return response()->json("success." , 200);

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
