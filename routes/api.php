<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/getCarriers', [App\Http\Controllers\Api\TestController::class, 'carriers'])->name('carriers');
Route::get('/findWorkers', [App\Http\Controllers\Api\TestController::class, 'workers'])->name('workers');
Route::get('/crossIntervals', [App\Http\Controllers\Api\TestController::class, 'crossIntervals'])->name('crossIntervals');
