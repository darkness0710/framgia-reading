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
    Route::get('/search', 'Web\BookController@searchData');
    Route::get('/{id}', 'Web\BookController@show')->name('book.show');
    Route::get('/', 'Web\BookController@index')->name('book.index');
    Route::get('/add-to-cart/{id}', 'Web\BookController@getAddToCart')
        ->name('book.addToCart');
    Route::get('/cart-remove-book/{id}', 'Web\BookController@getRemoveToCart')
        ->name('book.removeToCart');
    Route::post('/search-by-title', 'Web\BookController@searchByTitle');
});

Route::group(['prefix' => 'plan'], function () {
    Route::get('/search', 'Web\PlanController@searchData');
    Route::get('/', 'Web\PlanController@index')->name('plan.index');
    Route::get('/create', 'Web\PlanController@create')->middleware('authenticated');
    Route::get('/{id}', 'Web\PlanController@show')->name('plan.show');
    Route::post('/store', 'Web\PlanController@store')->middleware('authenticated');
});

Route::get('search', 'Web\HomeController@searchData')->name('search');

Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', 'Web\UserController@showPlans');
        Route::group(['prefix' => '/dashboard', 'middleware' => 'unauthenticated'], function () {
            Route::get('/', 'Web\UserController@dashboard')->name('user.dashboard');
            //Route Update Profile
            Route::get('/edit-profile', 'Web\UserController@editProfile');
            Route::post('/update-profile', 'Web\UserController@updateProfile');
            //Route Update Password
            Route::get('/edit-password', 'Web\UserController@editPassword');
            Route::post('/update-password', 'Web\UserController@updatePassword');
        });
        Route::group(['prefix' => '/admin', 'middleware' => 'auth.admin'], function () {
            Route::get('/', 'Web\AdminController@index')->name('admin.dashboard');
            Route::group(['prefix' => 'subjects'], function () {
                Route::get('/', 'Web\SubjectController@index')->name('admin.subject');
                Route::post('/', 'Web\SubjectController@store');
                Route::post('/{subject}', 'Web\SubjectController@update')->name('admin.subject.update');
                Route::get('/{subject_id}', 'Web\SubjectController@getData')->name('admin.subject.getData');
                Route::delete('/{subject_id}', 'Web\SubjectController@destroy')->name('admin.subject.destroy');
            });
            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', 'Web\CategoryController@indexDashboard')->name('admin.category');
            });
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'Web\UserController@indexDashboard')->name('admin.user');
            });
            Route::group(['prefix' => 'books'], function () {
                Route::get('/', 'Web\BookController@indexDashboard')->name('admin.book');
            });
            Route::group(['prefix' => 'plans'], function () {
                Route::get('/', 'Web\PlanController@indexDashboard')->name('admin.plan');
            });
        });
        Route::get('/profile', 'Web\UserController@profile');
    });
});

Route::group(['prefix' => 'subject'], function () {
    Route::get('/get-subject', 'Web\SubjectController@getAllSubjectByFilter');
    Route::get('/get-sort', 'Web\SubjectController@getAllSortByFilter');
});

Route::get('error', 'Web\HomeController@errorPage');
