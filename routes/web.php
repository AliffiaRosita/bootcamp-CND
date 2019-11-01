<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'FrontEndontroller@index');



Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('/', 'HomeController@index');

    Route::get('/test', 'TestController@index');

    Route::get('/adminlte', function () {
        return view('adminlte');
    });
    Route::get('post', 'PostController@index');
    Route::get('post/create', 'PostController@create');
    Route::post('post', 'PostController@store');
    Route::get('post/{id}/edit','PostController@edit');
    Route::put('post/{id}/update','PostController@update');
    Route::delete('post/{id}/delete','PostController@destroy');
    Route::resource('/categories', 'CategoryController');

    Route::get('/belajar-js', function () {
        return view('belajar-js');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
