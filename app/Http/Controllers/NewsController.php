<?php

namespace App\Http\Controllers;

use App\Models\News\News;
use App\Models\News\NewsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.news')->with([
            'news_top' => News::limit(4)->orderBy('id', 'desc')->get(),
            'property' => News::whereCategoryId(1)->limit(3)->get(),
            'social' => News::whereCategoryId(4)->limit(3)->get(),
            'technology' => News::whereCategoryId(2)->limit(3)->get(),
            'sport' => News::whereCategoryId(3)->limit(3)->get(),
        ]);
    }

    public function category($category)
    {
        $cat = NewsCategory::find($category);
        $news = News::whereCategoryId($category)->get();

        if($news){
            return view('news.category', ['category_news' => $news, 'category' => $cat->category]);
        }

        return redirect()->route('news');
    }

    public function view($news)
    {
        $news = News::find($news);
        if($news){
            //!* update view
            $view = ++$news->view;
            $news->view = $view;
            $news->save();

            return view('news.view', ['news' => $news]);
        }

        return redirect()->route('news');
    }

    public function tag($tag)
    {
        $news = News::Where('tag', 'like', '%'.$tag.'%')->get();

        if($news){
            return view('news.category', ['category_news' => $news, 'category' => $tag]);
        }

        return redirect()->route('news');
    }




    public function insert()
    {
        return view('news.insert')->with([
            'category' => NewsCategory::ddl()
        ]);
    }
    public function post_insert(Request $request)
    {
        $news = new News();
        $news->title = $request->input('topic');
        $news->subtitle = $request->input('topic_des');
        $news->content = $request->input('content');

        $news->category_id = $request->input('category');
        $news->user_id = 4;
        $news->tag = strtoupper ($request->input('tag'));

        $destinationPath = resource_path('images/');
        $file = $request->file('image');
        $filename = null;
        if($file){
            $filename = $file->getClientOriginalName();
            $filename = $this->getImageName($filename);
            $upload_success = $file->move($destinationPath, $filename);
            $news->image = $filename;
        }
        $news->save();

    }
    public function getImageName($filename)
    {
        $timestamp = Carbon::now()->toDayDateTimeString();
        $randomKey = str_random(5);
        return base64_encode($filename . $timestamp . $randomKey).'.jpg';
    }
}
