<?php

use Illuminate\Support\Facades\Route;

Route::post('/discount/restaurant/{id}', \App\Actions\Discounts\UpdateRestaurantDiscountAction::class)->name('discount.restaurant');
Route::post('/discount/category/{id}', \App\Actions\Discounts\UpdateCategoryDiscountAction::class)->name('discount.category');
Route::post('/discount/item/{id}', \App\Actions\Discounts\UpdateItemDiscountAction::class)->name('discount.item');

