<?php

use App\Actions\Categories\GetRestaurantSuperCategories;
use http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::get('restaurant/', GetRestaurantSuperCategories::class)->name('dashboard');
Route::get('restaurant/{id}', GetRestaurantSuperCategories::class)->name('restaurant');

Route::get('/category/{id}', \App\Actions\Categories\GetCategoryChildrenAction::class)->name('category.show');
Route::post('/category/', \App\Actions\Categories\AddCategoryAction::class)->name('category.store');
Route::delete('/category/{id}', \App\Actions\Categories\DeleteCategoryAction::class)->name('category.destroy');
