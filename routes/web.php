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
    Route::get('/admin-search', 'Web\BookController@adminSearchData');
    Route::get('/{id}', 'Web\BookController@show')->name('book.show');
    Route::get('/', 'Web\BookController@index')->name('book.index');
    Route::get('/add-to-cart/{id}', 'Web\BookController@getAddToCart')
        ->name('book.addToCart');
    Route::get('/cart-remove-book/{id}', 'Web\BookController@getRemoveToCart')
        ->name('book.removeToCart');
    Route::post('/search-by-title', 'Web\BookController@searchByTitle');
    Route::post('/review', 'Web\ReviewController@reviewBook')->name('book.review');
});

Route::group(['prefix' => 'plan'], function () {
    Route::get('/search', 'Web\PlanController@searchData');
    Route::get('/', 'Web\PlanController@index')->name('plan.index');
    // Route::post('/store', 'Web\PlanController@store')->middleware('guest');
    Route::post('/review', 'Web\ReviewController@reviewPlan')->name('plan.review');
    Route::group(['middleware' => 'authenticated'], function () {
        Route::get('/create', 'Web\PlanController@create')->name('plan.create');
        Route::get('/{id}/fork', 'Web\UserPlanController@showForkForm')->name('fork-form');
        Route::post('/{id}/fork', 'Web\UserPlanController@fork')->name('fork');
        Route::post('/store', 'Web\PlanController@store');
    });
    Route::get('/{id}', 'Web\PlanController@show')->name('plan.show');
});

Route::get('search', 'Web\HomeController@searchData')->name('search');

Route::group(['prefix' => 'user'], function () {
    Route::get('/search', 'Web\UserController@searchData');
    Route::get('/', 'Web\UserController@index')->name('user.index');
    Route::get('/admin-search', 'Web\UserController@adminSearchData');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', 'Web\UserController@showPlans')->name('user.plans');
        Route::group(['prefix' => '/dashboard', 'middleware' => 'unauthenticated'], function () {
            Route::get('/', 'Web\UserController@dashboard')->name('user.dashboard');
            //Route Update Profile
            Route::get('/edit-profile', 'Web\UserController@editProfile')->name('user.editProfile');
            Route::post('/update-profile', 'Web\UserController@updateProfile');
            //Route Update Password
            Route::get('/edit-password', 'Web\UserController@editPassword')->name('user.editPassword');
            Route::post('/update-password', 'Web\UserController@updatePassword');
            Route::get('/plans', 'Web\UserController@showMyPlans')->name('user.myPlans');
            Route::get('/plans/forked/{plan_id}', 'Web\UserPlanController@show')->name('forked-plan');
        });
        Route::group(['prefix' => '/admin', 'middleware' => ['auth.admin', 'unauthenticated']], function () {
            Route::get('/', 'Web\AdminController@index')->name('admin.dashboard');
            Route::group(['prefix' => 'subjects'], function () {
                Route::get('/', 'Web\SubjectController@indexDashboard')->name('admin.subject');
                Route::post('/', 'Web\SubjectController@store');
                Route::post('/{subject}', 'Web\SubjectController@update')->name('admin.subject.update');
                Route::get('/{subject_id}', 'Web\SubjectController@getData')->name('admin.subject.getData');
                Route::delete('/{subject_id}', 'Web\SubjectController@destroy')->name('admin.subject.destroy');
            });
            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', 'Web\CategoryController@indexDashboard')
                    ->name('admin.category');
                Route::delete('/{category_id}', 'Web\CategoryController@destroy')
                    ->name('admin.category.destroy');
            });
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'Web\UserController@indexDashboard')->name('admin.user');
                Route::post('/store', 'Admin\UserController@store')->name('admin.user.store');
            });
            Route::group(['prefix' => 'books'], function () {
                Route::get('/', 'Web\BookController@indexDashboard')->name('admin.book');
                Route::post('/store', 'Admin\BookController@store')->name('admin.book.store');
                Route::get('/show/{book_id}', 'Admin\BookController@show')->name('admin.book.show');
                Route::get('/edit/{book_id}', 'Admin\BookController@edit')->name('admin.book.edit');
                Route::post('/update/{book_id}', 'Admin\BookController@update')->name('admin.book.update');
                Route::delete('/{book_id}', 'Web\BookController@destroy')
                    ->name('admin.book.destroy');
            });
            Route::group(['prefix' => 'plans'], function () {
                Route::get('/', 'Web\PlanController@indexDashboard')->name('admin.plan');
            });
        });
        Route::get('/profile', 'Web\UserController@profile')->name('user.profile');

    });
});

Route::group(['prefix' => 'subject'], function () {
    Route::get('/search', 'Web\SubjectController@searchData');
    Route::get('/admin-search', 'Web\SubjectController@adminSearchData');
    Route::get('/', 'Web\SubjectController@index')->name('subject.index');
    Route::get('/{id}', 'Web\SubjectController@show')->name('subject.show');
    Route::get('/get-subject', 'Web\SubjectController@getAllSubjectByFilter');
    Route::get('/get-sort', 'Web\SubjectController@getAllSortByFilter');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/admin-search', 'Web\CategoryController@adminSearchData');
});

Route::get('error', 'Web\HomeController@errorPage')->name('error');
