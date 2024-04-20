<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/restaurant', \App\Actions\Restaurants\BrowseRestaurantAction::class);
