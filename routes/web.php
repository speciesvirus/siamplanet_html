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
Route::get('/nc', function() {
   return view('news.category');
});
Route::get('/nv', function() {
   return view('news.view');
});