<?php

namespace App\Providers;

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
}
