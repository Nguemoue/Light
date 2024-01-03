<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    "middleware" =>"auth:admin",
    "prefix" => "admin/",
    "as" => "admin."
],function (){
    Route::get('/home', \App\Http\Controllers\Admin\AdminHomeControlerController::class)->name("home");
    Route::resource("dailyBreads",\App\Http\Controllers\Admin\AdminDailyBreadController::class);
    //group de login
    Route::group([
        "middleware" => "guest:admin",
        'excluded_middleware' => "auth:admin"
    ],function (){
        Route::get("login",[\App\Http\Controllers\Admin\AdminLoginController::class,"create"])->name("login");
        Route::post("login",[\App\Http\Controllers\Admin\AdminLoginController::class,"store"])->name("login");
    });
});



