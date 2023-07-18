<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('auth.login');
    Route::post('authenticate', [App\Http\Controllers\Admin\AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::middleware(['auth'])->group(function () {
        Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('auth.logout');

        // Admin Dashboard Route
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');

        // Setting Routes
        Route::controller(App\Http\Controllers\Admin\SettingController::class)->prefix('setting')->group(function () {
            Route::get('/', 'index')->name('setting');
            Route::put('/update', 'update')->name('setting.update');
        });

        //Message Routes
        Route::controller(App\Http\Controllers\Admin\MessageController::class)->prefix("message")->group(function () {
            Route::get("/", "index")->name("message.index");
            Route::get("/{message}/show", "show")->name("message.show");
            Route::get("/{message}/reply", "reply")->name("message.reply");
            Route::post("/send", "send")->name("message.send");
            Route::delete("/{message}/destroy", "destroy")->name("message.destroy");
        });

        // Resource Routes
        foreach (App\Enums\ModuleEnum::cases() as $module) {
            //Route::resource($module->route(), $module->controller())->except('show')->names($module->route());
            Route::resource($module->route(), $module->controller())->names($module->route());
        }

        // Other Routes
        Route::post('editor/upload')->uses("App\Http\Controllers\Admin\EditorController@upload")->name("editor.upload");
        Route::get('cache-clear')->uses("App\Http\Controllers\Admin\HomeController@cacheClear")->name('cache-clear');
        Route::get("language/{language}/files")->uses("App\Http\Controllers\Admin\LanguageController@files")->name("language.files");

        // Product Routes
        // Route::get("product/{id}")->uses("App\Http\Controllers\Admin\ProductController@show")->name("product.show");
        Route::get("product/{id}/image")->uses("App\Http\Controllers\Admin\ProductController@image")->name("product.image");
        Route::post("product/image/store")->uses("App\Http\Controllers\Admin\ProductController@imageStore")->name("product.image.store");
        Route::delete("product/image/{id}/destroy")->uses("App\Http\Controllers\Admin\ProductController@imageDestroy")->name("product.image.destroy");
    });
});
