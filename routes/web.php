<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', \App\Actions\Restaurants\BrowseRestaurantAction::class);
Route::get('/restaurant/{id}', \App\Actions\Categories\GetRestaurantSuperCategories::class)->name('restaurant');
require 'auth.php';
require 'categories.php';
require 'menu_Items.php';
require 'discount.php';

