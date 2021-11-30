<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('app.welcome');
});


Route::get('/sql', [App\Http\Controllers\TestController::class, 'sql'])->name('sql');
Route::get('/olympiad', [App\Http\Controllers\TestController::class, 'showOlympiadPage'])->name('olympiad');


