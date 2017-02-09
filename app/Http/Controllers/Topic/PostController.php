<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post');
    }

    public function post(Request $data)
    {
        $this->validator($data);

        if (Auth::attempt(['username' => $data['user'], 'password' => $data['pass'], 'activated' => 0], true)) {
            return redirect()->route('home');
        }
        return redirect()->back()->withInput()->with(['alert-message' => 'username or password not found!', 'code' => '1']);
    }
}
