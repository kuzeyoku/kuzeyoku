<?php

namespace App\Providers;

use App\Enums\StatusEnum;
use App\Models\Popup;
use Illuminate\Support\ServiceProvider;

class PopupProvider extends ServiceProvider
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
        $popup = Popup::whereStatus(StatusEnum::Active->value)->first();
        view()->composer('layout.popup', function ($view) use ($popup) {
            $view->with(compact('popup'));
        });
    }
}
