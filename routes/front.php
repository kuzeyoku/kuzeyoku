<?php

use Illuminate\Support\Facades\Route;

Route::get("/contact", [App\Http\Controllers\ContactController::class, "index"])->name("contact.index");
Route::post("/contact/send", [App\Http\Controllers\ContactController::class, "send"])->name("contact.send");

