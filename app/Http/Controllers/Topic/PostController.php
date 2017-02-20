<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductArea;
use App\Models\Product\ProductFacility;
use App\Models\Product\ProductSale;
use App\Models\Product\ProductType;
use App\Models\Product\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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

    public function post(Request $data)
    {
        $this->validator($data);

        if(auth()){
            echo 'a';
        }

        $destinationPath = resource_path('images/');

        // getting all of the post data
        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        echo 'a => '.$file_count;
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $filename = $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
        }

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
            'images'             => 'required|image',
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
}
