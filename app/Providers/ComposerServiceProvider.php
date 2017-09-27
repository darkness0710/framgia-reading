<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Session;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['*'], function($view) {
            if(Session('cart')) {
                $old_cart = Session::get('cart');
                $cart = new Cart($old_cart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'products_cart' => $cart->items,
                    'totalQty' => $cart->totalQty
                ]);
            }
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
