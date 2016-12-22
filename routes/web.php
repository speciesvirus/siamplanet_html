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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/view', function () {
    return view('view');
});
Route::get('/test', function() {
   return view('test');
});
Route::get('/news', function() {
   return view('news.news');
});
Route::get('/news/category', function() {
   return view('news.category');
});
Route::get('/news/view', function() {
   return view('news.view');
});