<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return Inertia::render('Home');
});

Route::get('/dashboard', function (){return Inertia::render('Dashboard/Categories');});

require 'auth.php';
require 'categories.php';
require 'menu_Items.php';

