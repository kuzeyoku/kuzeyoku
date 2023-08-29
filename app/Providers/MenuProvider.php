<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layout.header', function ($view) {
            $view->with('headerMenu', Menu::whereType('header')->order()->get());
        });
        view()->composer('layout.footer', function ($view) {
            $view->with('footerMenu', Menu::whereType('footer')->order()->get());
        });
    }
}
