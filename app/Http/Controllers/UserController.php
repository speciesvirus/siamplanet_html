<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\ProductMessage;
use App\Models\Social;
use App\Models\User;
use App\Models\UserContact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::leftJoin('socials', 'socials.user_id', '=', 'users.id')
            ->select('users.first_name', 'users.last_name','users.email', 'users.avatar', 'socials.avatar as av_social')
            ->where('users.id', auth()->id())->first();

        $avatar = $user->avatar ? route('images.q').'?q='.$user->avatar.'&view=avatar' : ($user->av_social ? $user->av_social : route('images.q').'?q=') ;
        $product = Product::whereUserId(auth()->id())->orderBy('id', 'desc')->get();

        $message = null;
        if(!$product->isEmpty()) $message = ProductMessage::whereProductId($product[0]->id)->get();

        $contact = UserContact::first(auth()->id());

        return view('member.home', [
            'user' => $user,
            'user_avatar' => $avatar,
            'user_product' => $product,
            'product_message' => $message,
            'user_contact' => $contact
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePhone(Request $request)
    {
        $contact = UserContact::first(auth()->id());

        if($contact){
            $contact->phone = $request->phone;
            $contact->save();
            return response()->json(['message' => 'update success!'], 200);
        }

        $contact = new UserContact();
        $contact->user_id = auth()->id();
        $contact->phone = $request->phone;
        $contact->sort = 1;
        $contact->save();

        return response()->json(['message' => $request->phone], 200);
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateMessage(Request $request)
    {
        $contact = UserContact::first(auth()->id());

        if($contact){
            $contact->message = $request->message;
            $contact->save();
            return response()->json(['message' => 'update success!'], 200);
        }

        $contact = new UserContact();
        $contact->user_id = auth()->id();
        $contact->message = $request->message;
        $contact->sort = 1;
        $contact->save();

        return response()->json(['message' => $request->message], 200);
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMessage(Request $request)
    {
        $message = ProductMessage::where('product_id', $request->messageId)->orderBy('id', 'desc')->get();

        return response()->json(['message' => $message], 200);
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();
        if($product){
            $product->status = $request->status;
            $product->save();
            return response()->json(['result' => 'ระบบได้รับการแจ้งจากท่านแล้ว'], 200);
        }
        return response()->json(['result' => 'เกิดข้อผิดพลาด!'], 200);
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        $destinationPath = base_path('photos/avatar/');
        $input = $request->except('_token');

        foreach ($input as $key => $value) {
            $file = $request->file($key);
            $filename = null;
            if($file){
                $filename = $this->getNewName($file);
                $upload_success = $file->move($destinationPath, $filename);

                $user = User::find(auth()->id());
                if($user){
                    Storage::disk('avatar')->delete($user->avatar);
                    $user->avatar = $filename;
                    $user->save();

                    return response()->json(['message' => 'update success!'], 200);
                }
            }
        }

        return response()->json(['result' => 'เกิดข้อผิดพลาด!'], 200);
    }

    private function getNewName($file)
    {
        $new_filename = $this->translateFromUtf8(trim(pathinfo($file->getClientOriginalName(), 8)));

        if (config('lfm.rename_file') === true) {
            $new_filename = uniqid();
        } elseif (config('lfm.alphanumeric_filename') === true) {
            $new_filename = preg_replace('/[^A-Za-z0-9\-\']/', '_', $new_filename);
        }

        return $new_filename . '.' . $file->getClientOriginalExtension();
    }

}
