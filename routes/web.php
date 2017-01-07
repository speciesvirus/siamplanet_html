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
Route::get('/login', function() {
    return view('login');
});
Route::get('/join', function() {
    return view('join');
});

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/view', function () {
    return view('view');
});
Route::get('/test', function() {
   return view('test');
});
Route::get('/news', function() {
   return view('news.news');
});
Route::get('/nc', function() {
   return view('news.category');
});
Route::get('/nv', function() {
   return view('news.view');
});
Route::get('/post', function() {
    return view('post');
});


//Route::get('/home', 'HomeController@index');




Route::get('/',['as' => 'home','uses' =>'HomeController@index']);

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

Route::group(['middleware' => 'authenticate:all'], function()
{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
});

//Auth::routes(['login' => 'auth.login']);

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);
