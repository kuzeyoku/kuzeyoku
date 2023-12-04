<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
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
            $pageList = config("setting.information");
            if ($pageList) {
                $pageList = array_filter($pageList, "is_numeric");
                $pages = [];
                foreach ($pageList as $index => $page)
                    $pages[$index] = Page::find($page);
                $services = $cache->remember("services", $cacheTime, function () {
                    $query = \App\Models\Service::active()->order()->limit(5)->get();
                    if ($query->count() > 0)
                        return $query;
                    return [];
                });
                $view->with(compact("pages", "services"));
            }
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

        view()->composer("layout.topbar", function ($view) use ($cache, $cacheTime) {
            $languageList = $cache->remember("languageList", $cacheTime, function () {
                $language = new \App\Models\Language();
                return $language->active()->pluck("title", "code");
            });
            $view->with(compact("languageList"));
        });
    }
}
