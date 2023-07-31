<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Nothing to do here.
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // if (Schema::hasTable('settings')) {
        //     config()->set("setting", Cache::remember('setting', 3600, function () {
        //         return Setting::pluck("value", "key");
        //     }));
        // }

        // $settingConfig = Cache::remember('setting', 3600, function () {
        //     return Schema::hasTable('settings') ? Setting::pluck("value", "key") : [];
        // });

        // config()->set("setting", $settingConfig);

        $settingsConfig = Cache::rememberForever('setting', function () {
            $settings = Schema::hasTable('settings') ? Setting::all() : collect([]);
            $config = [];
            $settings->each(function ($setting) use (&$config) {
                $config["setting.{$setting->category}.{$setting->key}"] = $setting->value;
            });
            return $config;
        });
        config($settingsConfig);
    }
}
