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


Auth::routes();

Route::get('/', 'Web\HomeController@index');

Route::group(['prefix' => 'book'], function () {
    Route::get('/{id}', 'Web\BookController@show')->name('book.show');
});

Route::get('search', 'Web\HomeController@searchData')->name('search');
Route::group(['prefix' => 'user/{id}'], function () {
    Route::group(['prefix' => 'detail'], function () {
        Route::get('/dashboard', 'Web\UserController@dashboard');
    });
});
