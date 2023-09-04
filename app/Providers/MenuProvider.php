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
        $headerMenu = cache()->remember(3600, 'headerMenu', function () {
            return Menu::whereType("header")->order()->get();
        });
        $footerMenu = cache()->remember(3600, 'footerMenu', function () {
            return Menu::whereType('footer')->order()->get();
        });

        view()->composer('layout.header', function ($view) use ($headerMenu) {
            $view->with('headerMenu', $headerMenu);
        });
        view()->composer('layout.footer', function ($view) use ($footerMenu) {
            $view->with('footerMenu', $footerMenu);
        });
    }
}
