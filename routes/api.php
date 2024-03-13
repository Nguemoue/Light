<?php

use App\Http\Controllers\Api\DailyBread\ApiCommentController;
use App\Http\Controllers\Api\DailyBread\ApiLikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return  $request->user();
});

Route::group(['prefix' => "v1","as" => "api."],function (){
    Route::post("comment/dailyBread/{dailyBread}",[ApiCommentController::class,"store"])->name('comment.dailyBread');
    Route::post("like/dailyBread/{dailyBread}",[ApiLikeController::class,"store"])->name('like.dailyBread');
});
