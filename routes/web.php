<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return \Inertia\Inertia::render('Home');
});

Route::controller(\App\Http\Controllers\Auth\LoginController::class)->prefix('/login')->name('login.')->group(function (){
    Route::get('/', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Auth\RegisterController::class)->prefix('/register')->name('register.')->group(function (){
    Route::get('/', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});
