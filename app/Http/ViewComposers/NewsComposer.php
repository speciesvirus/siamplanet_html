<?php
/**
 * Created by PhpStorm.
 * User: Plai
 * Date: 4/2/2017
 * Time: 11:08 PM
 */

namespace App\Http\ViewComposers;

use App\Models\News\News;
use Illuminate\View\View;

class NewsComposer
{
    /**
     * Create a new profile composer.
     *
     * @param  void  $users
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'navigator_news_random' => function($newsId, $categoryId, $tag) { return $this->news_random($newsId, $categoryId, $tag); },
        ]);
    }

    /**
     * Bind data to the view.
     *
     * @param  Int  $newsId
     * @param  String  $categoryId
     * @param  String  $tag
     * @return void
     */
    function news_random($newsId, $categoryId, $tag){
        //dd($categoryId. ' a '. $tag);
        $news = News::inRandomOrder()->limit(3);
        if($newsId) $news->where('id', '<>', $newsId);
        if($categoryId) $news->where('category_id', '<>', $categoryId);
        if($tag) $news->where('tag', 'not like', '%'.$tag.'%');

        return $news->get();
    }

}