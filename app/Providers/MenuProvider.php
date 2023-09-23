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
        $cache = cache();
        $cacheTime = config("setting.caching.time", 3600);

        view()->composer("layout.footer", function ($view) use ($cache, $cacheTime) {
            $pages = $cache->remember("footerPages", $cacheTime, function () {
                $page = new Page();
                if (!Schema::hasTable($page->getTable()))
                    return [];
                return $page->whereStatus(StatusEnum::Active)->limit(5)->get();
            });

            $services = $cache->remember("footerServices", $cacheTime, function () {
                $service = new Service();
                if (!Schema::hasTable($service->getTable()))
                    return [];
                return $service->whereStatus(StatusEnum::Active)->limit(5)->get();
            });
            $view->with(compact("pages", "services"));
        });

        view()->composer("layout.header", function ($view) use ($cache, $cacheTime) {
            $headerMenu = $cache->remember("headerMenu", $cacheTime, function () {
                $menu = new Menu();
                if (!Schema::hasTable($menu->getTable()))
                    return [];
                return $menu->whereType("header")->order()->get();
            });
            $view->with(compact("headerMenu"));
        });
    }
}
