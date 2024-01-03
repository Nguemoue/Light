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

Route::middleware("web")->group(function (){
    Route::get('/', \App\Http\Controllers\Home\HomeController::class)->name("home");
});

Route::get("daily-breads",[\App\Http\Controllers\Home\DailyBreadController::class,"index"])->name("daily-bread.index");
Route::get("musiques",[\App\Http\Controllers\Home\MusiqueController::class,"index"])->name("musiques.index");
Route::get("daily-breads/{dailyBread}",[\App\Http\Controllers\Home\DailyBreadController::class,"show"])->name("daily-bread.show");
Route::resource("encounters",\App\Http\Controllers\Home\EncounterController::class);
Route::resource("formations",\App\Http\Controllers\Home\FormationController::class);
Route::get('/dashboard', \App\Http\Controllers\Home\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
