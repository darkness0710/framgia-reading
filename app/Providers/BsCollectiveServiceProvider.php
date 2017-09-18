<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BsCollective\BsFormBuilder;

class BsCollectiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('bs.form', function ($app) {
            $form = new BsFormBuilder(
                $app['html'],
                $app['url'],
                $app['view'],
                $app['session.store']->token(),
                $app['request']
            );

            return $form->setSessionStore($app['session.store']);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
