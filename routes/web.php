<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return Inertia::render('Home');
});

require 'auth.php';
require 'categories.php';
require 'menu_Items.php';
require 'discount.php';

