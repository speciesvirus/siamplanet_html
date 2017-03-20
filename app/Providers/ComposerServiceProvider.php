<?php

namespace App\Providers;

use App\Models\News\NewsCategory;
use App\Models\Product\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            ['home', 'view', 'review'] //*! file view .blade
            , 'App\Http\ViewComposers\NavigatorComposer'
        );

        View::composer(
            ['home', 'view', 'review']
            , 'App\Http\ViewComposers\ProductComposer'
        );

        // Using Closure based composers...
        View::composer('*', function ($view) {
            //$view->with('categories', Categories::where('parent_id',NULL)->orderBy('id')->get());

            $view->with([
                'category_name' => function($categoryId) { return $this->selectCategory($categoryId); },
                'product_type' => function($productTypeId) { return $this->selectProductType($productTypeId); }
            ]);

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function selectCategory($categoryId){

        if(!session('category')){
            session(['category' => NewsCategory::get()]);
        }

        foreach (session('category') as $value){
            if($value->id == $categoryId) return $value->category;
        }

    }

    public function selectProductType($productTypeId){

        if(!session('productType')){
            session(['productType' => ProductType::get()]);
        }

        foreach (session('productType') as $value){
            if($value->id == $productTypeId) return $value->type;
        }

    }
}
