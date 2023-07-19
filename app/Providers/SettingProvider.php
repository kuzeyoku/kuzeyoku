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

        $settingConfig = Cache::remember('setting', 3600, function () {
            return Schema::hasTable('settings') ? Setting::pluck("value", "key") : [];
        });

        config()->set("setting", $settingConfig);
    }

    public static function getSmtpSettings(): object
    {
        return (object) [
            'host' => config('setting.smtp_host', env('MAIL_HOST', 'smtp.mailgun.org')),
            'port' => config('setting.smtp_port', env('MAIL_PORT', 587)),
            'encryption' => config('setting.smtp_encryption', env('MAIL_ENCRYPTION', 'tls')),
            'username' => config('setting.smtp_username', env('MAIL_USERNAME')),
            'password' => config('setting.smtp_password', env('MAIL_PASSWORD')),
        ];
    }
}
