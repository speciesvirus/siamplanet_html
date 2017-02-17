<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductUnit;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $unit = ProductUnit::where('active', 'A')->orderBy('sort')->pluck('unit', 'id');

        return view('post')->with([
            'unit' => $unit,
            'code' => '1'
        ]);

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
