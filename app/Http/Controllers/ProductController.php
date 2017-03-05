<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\ProductMessage;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the only product.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        $this->validator($request);

        $user_id = Product::find($request->input('product'))->user_id;
        if($user_id){
            $message = new ProductMessage();
            $message->first_name = $request->input('first_name');
            $message->last_name = $request->input('last_name');
            $message->email = $request->input('email');
            $message->phone = $request->input('phone');
            $message->message = $request->input('comments');

            $user = User::find($user_id);
            $product = Product::find($request->input('product'));
            $message->user()->associate($user);
            $message->product()->associate($product);

            $message->save();

            return response()->json(['alert-message' => 'ข้อความของคุณถูกส่งเรียบร้อย.'] , 200);
        }

        return response()->json(['alert-message' => 'เกิดข้อผิดพลาด!'] , 422);

    }

    protected function validator(Request $request)
    {
        $rules = [
            'first_name'            => 'required',
            'last_name'             => 'required',
            'phone'                 => 'required|numeric|min:9|digits_between:9,10',
            'comments'              => 'required'
        ];
        $messages = [
            'first_name.required'   => 'First Name is required',
            'last_name.required'    => 'Last Name is required',
        ];

        return $this->validate($request, $rules, $messages);
    }

}
