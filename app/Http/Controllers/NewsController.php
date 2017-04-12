<?php

namespace App\Http\Controllers;

use App\Models\News\News;
use App\Models\News\NewsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $news = News::whereCategoryId($category)->paginate(3);

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

            $param = [
                'news' => $news,
                'social' => collect([
                    'thumbnails' => route('images.q').'?q='.$news->image.'&view=news',
                    'title' => $news->title,
                    'des' => $news->subtitle,
                ])
            ];

            return view('news.view', $param);
        }

        return redirect()->route('news');
    }

    public function tag($tag)
    {
        $news = News::Where('tag', 'like', '%'.$tag.'%')->paginate(3);

        if($news){
            return view('news.category', ['category_news' => $news, 'category' => $tag]);
        }

        return redirect()->route('news');
    }
    
    public function autoloadTag(Request $request)
    {
        $news = News::Where('tag', 'like', '%'.$request->input('tag').'%')->paginate(3, ['*'], 'page', $request->input('page'));

        return view('_partials.category-list', ['category_news' => $news]);
        // return response()->json([
        //     'category_news' => $news
        // ]);

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
        $news->user_id = Auth::id();
        $news->tag = mb_strtoupper($request->input('tag'), 'UTF-8');

        $destinationPath = $path = base_path('photos/shares/news');
        $file = $request->file('image');
        if($file){
            $filename = $this->getNewName($file);
            $upload_success = $file->move($destinationPath, $filename);
            $news->image = $filename;
        }
        $news->save();

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
