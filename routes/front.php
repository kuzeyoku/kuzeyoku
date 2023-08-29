<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [App\Http\Controllers\HomeController::class, "index"])->name("home");

Route::get("/contact", [App\Http\Controllers\ContactController::class, "index"])->name("contact.index");
Route::post("/contact/send", [App\Http\Controllers\ContactController::class, "send"])->name("contact.send");

Route::get("/sitemap.xml", [App\Http\Controllers\SitemapController::class, "index"])->name("sitemap.index");

//Route::get("/page/{page}/{slug}", [App\Http\Controllers\PageController::class, "show"])->name("page.show");

Route::get("/blog", [App\Http\Controllers\BlogController::class, "index"])->name("blog.index");
Route::get("/blog/{post}/{slug}", [App\Http\Controllers\BlogController::class, "show"])->name("blog.show");

Route::controller(App\Http\Controllers\ServiceController::class)->prefix("service")->group(function () {
    Route::get("/", "index")->name("service.index");
    Route::get("/{service}/{slug}", "show")->name("service.show");
});

//Route::get("/category/{category}/{slug}", [App\Http\Controllers\CategoryController::class, "show"])->name("category.show");
