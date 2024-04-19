<?php

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\RegisterAction;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return \Inertia\Inertia::render('Home');
});


Route::prefix('/login')->name('login.')->group(function (){

    Route::get('/', function (){
        return Inertia::render('Auth/Login');
    })->name('create');

    Route::post('/login', LoginAction::class);

//    Route::delete('/', 'destroy')->name('destroy');
});

Route::prefix('/register')->name('register.')->group(function (){
    Route::get('/', function (){
        return Inertia::render('Auth/Register');
    })->name('create');
    Route::post('/', RegisterAction::class)->name('store');
});
