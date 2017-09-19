<?php

namespace App\Providers;

use App;
use App\Repositories\Contracts\BookRepositoryInterface;
use App\Repositories\Eloquent\BookRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(BookRepositoryInterface::class, BookRepository::class);
    }
}
