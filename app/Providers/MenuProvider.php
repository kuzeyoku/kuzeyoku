<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Service;
use App\Enums\StatusEnum;
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
        if (Schema::hasTable("menus")) {
            $cache = cache();
            $cacheTime = config("setting.caching.time", 3600);

            $headerMenu = $cache->remember("headerMenu", $cacheTime, function () {
                return Menu::whereType("header")->order()->get();
            });

            $pages = $cache->remember("footerPages", $cacheTime, function () {
                return Page::whereStatus(StatusEnum::Active)->limit(5)->get();
            });

            $services = $cache->remember("footerServices", $cacheTime, function () {
                return Service::whereStatus(StatusEnum::Active)->limit(5)->get();
            });

            view()->composer('layout.header', function ($view) use ($headerMenu) {
                $view->with('headerMenu', $headerMenu);
            });

            view()->composer('layout.footer', function ($view) use ($pages, $services) {
                $view->with(["pages" => $pages, "services" => $services]);
            });
        }
    }
}
