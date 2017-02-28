<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/login',
    ['as' => 'login', 'uses' => 'Auth\LoginController@index']
);
Route::post('/login/on',
    ['as' => 'user.login', 'uses' => 'Auth\LoginController@login']
);
Route::post('/join',
    ['as' => 'join', 'uses' => 'Auth\RegisterController@register']
);
// Route::get('/images/{q?}', function ($q = null) {
//     $path = app_path();
//     return Storage::disk('local')->get('Images/'.$q);
//     return response()->file(resource_path('images/'.$q));
// });
Route::get('/images/{q?}', [
    'uses' => 'ImageController@index',
    'as' => 'images.q'
]);

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/view', function () {
    return view('view');
});
Route::get('/test', function() {
   return view('test');
});
Route::get('/news',
    ['as' => 'news', 'uses' => 'NewsController@index']
);

Route::get('/nc', function() {
   return view('news.category');
});
Route::get('/nv', function() {
   return view('news.view');
});
//Route::get('/post', function() {
//    return view('post');
//});

Route::get('/post',
    ['as' => 'product.view', 'uses' => 'Topic\PostController@index']
);
Route::post('/search/{q?}',
    ['as' => 'search', 'uses' => 'SearchController@index']
);
Route::group(['middleware' => ['web']], function () {

    Route::post('/post',
        ['as' => 'product.post', 'uses' => 'Topic\PostController@post']
    );
    Route::post('/post/validator',
        ['as' => 'product.validator', 'uses' => 'Topic\PostController@formValidator']
    );
    Route::post('/post/image',
        ['as' => 'product.image', 'uses' => 'Topic\PostController@image']
    );

});

//$topic = 'topic.';
//Route::get('/post',
//    ['as' => $topic.'post', 'uses' => 'Topic\PostController@index']
//);


//Route::get('/home', 'HomeController@index');




Route::get('/',
    ['as' => 'home','uses' =>'HomeController@index']
);
Route::get('/{type?}/{page?}',
    ['as' => 'home.search', 'uses' => 'HomeController@index']
);
Route::get('/{product?}',
    ['as' => 'product', 'uses' => 'HomeController@product']
);


Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function()
{
    $a = 'admin.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'AdminController@getHome']);

});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function()
{
    $a = 'user.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'UserController@getHome']);

});

Route::group(['middleware' => 'auth:all'], function()
{
    $a = 'auth.';
    Route::get('/logout', [
        'as' => $a . 'logout',
        'uses' => 'Auth\LoginController@logout']
    );
});

//Auth::routes(['login' => 'auth.login']);

$s = 'social.';
Route::get('/social/redirect/{provider}', [
    'as' => $s.'redirect',
        'uses' => 'Auth\SocialController@getSocialRedirect']
);
Route::get('/social/handle/{provider}', [
    'as' => $s.'handle',
        'uses' => 'Auth\SocialController@getSocialHandle']
);
