<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use App\Enums\StatusEnum;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('menus')) {
            $headerMenu = Menu::whereType("header")->order()->get();
            $footerMenu = Menu::whereType('footer')->order()->get();
            $pages = Page::whereStatus(StatusEnum::Active)->limit(5)->get();
            $services = Service::whereStatus(StatusEnum::Active)->limit(5)->get();

            view()->composer('layout.header', function ($view) use ($headerMenu) {
                $view->with('headerMenu', $headerMenu);
            });

            view()->composer('layout.footer', function ($view) use ($footerMenu, $pages, $services) {
                $view->with(["footerMenu" => $footerMenu, "pages" => $pages, "services" => $services]);
            });
        }
    }
}
