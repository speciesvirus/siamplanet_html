<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductArea;
use App\Models\Product\ProductFacility;
use App\Models\Product\ProductSale;
use App\Models\Product\ProductType;
use App\Models\Product\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

    public function post(Request $request)
    {
        $this->validator($request);

        $destinationPath = resource_path('images/');
        $input = $request->except('_token');
        $img = true;
        foreach ($input as $key => $value) {
            if (strpos($key, 'pimg') !== false) {
                $file = $request->file($key);
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
                $img = false;
            }
        }

        if($img) return redirect()->back()->withInput()->withErrors(['images' => 'images is required']);

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

        //return response()->json($this->validate($request, $rules, $messages), 200);
        return response()->json(null , 200);
    }
}
