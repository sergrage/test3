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


Route::get('/test4', [App\Http\Controllers\TestController::class, 'test4'])->name('test4');

Route::get('/test5', [App\Http\Controllers\TestController::class, 'test5'])->name('test5');
Route::get('/test6', [App\Http\Controllers\TestController::class, 'test6'])->name('test6');

Route::get('/testSql', [App\Http\Controllers\TestController::class, 'testSql'])->name('testSql');

