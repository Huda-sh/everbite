<?php

use Illuminate\Support\Facades\Route;

Route::post('/discount/restaurant/{id}', \App\Actions\Discounts\AddRestaurantDiscountAction::class)->name('discount.restaurant');

