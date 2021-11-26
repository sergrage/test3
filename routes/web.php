<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('app.welcome');
});

Route::get('/test1', [App\Http\Controllers\TestController::class, 'test1'])->name('test1');
Route::get('/test2', [App\Http\Controllers\TestController::class, 'test2'])->name('test2');
Route::get('/test3', [App\Http\Controllers\TestController::class, 'test3'])->name('test3');
