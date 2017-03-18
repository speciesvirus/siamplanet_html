<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.news');
    }

    public function category()
    {
        return view('news.category');
    }

    public function view()
    {
        return view('news.view');
    }
}
