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
            Route::post("/sendReply", "sendReply")->name("message.sendReply");
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
        Route::post("logclean")->uses("App\Http\Controllers\Admin\HomeController@logclean")->name("logclean");

        Route::controller(App\Http\Controllers\Admin\LanguageController::class)->prefix("language")->group(function () {
            Route::match(["get", "post"], "/{language}/files", "files")->name("language.files");
            Route::post("/{language}/getFileContent", "getFileContent")->name("language.getFileContent");
            Route::put("/{language}/updateFileContent", "updateFileContent")->name("language.updateFileContent");
        });

        Route::controller(App\Http\Controllers\Admin\ProductController::class)->prefix("product")->group(function () {
            // Route::get("/{project}", "show")->name("product.show");
            Route::get("/{product}/image", "image")->name("product.image");
            Route::post("/image/store", "imageStore")->name("product.image.store");
            Route::delete("/{image}/imagedelete", "imageDelete")->name("product.image.delete");
            Route::delete("/{product}/imagealldelete", "imageAllDelete")->name("product.image.alldelete");
        });

        Route::controller(App\Http\Controllers\Admin\ProjectController::class)->prefix("project")->group(function () {
            Route::get("/{project}/image", "image")->name("project.image");
            Route::post("/image/store", "imageStore")->name("project.image.store");
            Route::delete("/{image}/imagedelete", "imageDelete")->name("project.image.delete");
            Route::delete("/{project}/imagealldelete", "imageAllDelete")->name("project.image.alldelete");
        });
    });
});
