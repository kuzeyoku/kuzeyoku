<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/setup", [App\Http\Controllers\SetupController::class, "index"])->name("setup");

require __DIR__ . "/admin.php";
require __DIR__ . "/front.php";

Route::fallback(function () {
    return view('errors.404');
});
