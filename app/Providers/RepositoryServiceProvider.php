<?php

namespace App\Providers;

use App;
use App\Repositories\Contracts\BookRepositoryInterface;
use App\Repositories\Eloquent\BookRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface;
use App\Repositories\Eloquent\SubjectRepository;
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
        App::bind(SubjectRepositoryInterface::class, SubjectRepository::class);
    }
}
