<?php

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\RegisterAction;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/login')->name('login.')->group(function () {

    Route::get('/',
        function () {return Inertia::render('Auth/Login');})->name('create');

    Route::post('', LoginAction::class);

    Route::delete('/', LogoutAction::class)->name('destroy');
});

Route::prefix('/register')->name('register.')->group(function () {

    Route::get('/',
        function () { return Inertia::render('Auth/Register');})->name('create');

    Route::post('/', RegisterAction::class)->name('store');
});
