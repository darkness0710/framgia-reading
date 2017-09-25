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

Route::get('/', 'Web\HomeController@index')->name('home');

Route::group(['prefix' => 'book'], function () {
    Route::get('/{id}', 'Web\BookController@show')->name('book.show');
});

Route::group(['prefix' => 'plan'], function () {
    Route::get('/{id}', 'Web\PlanController@show')->name('plan.show');
});

Route::get('search', 'Web\HomeController@searchData')->name('search');
Route::group(['prefix' => 'user/{id}'], function () {
    Route::group(['prefix' => 'detail'], function () {
        Route::get('/dashboard', 'Web\UserController@dashboard');

        //Route Update Profile
        Route::get('/edit-profile', 'Web\UserController@editProfile');
        Route::post('/update-profile', 'Web\UserController@updateProfile');

        //Route Update Password
        Route::get('/edit-password', 'Web\UserController@editPassword');
        Route::post('/update-password', 'Web\UserController@updatePassword');
    });
});
