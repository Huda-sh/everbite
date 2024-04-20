<?php


use Illuminate\Support\Facades\Route;

Route::get('/item/{id}', \App\Actions\Items\GetItemsAction::class)->name('item.index');
//Route::post('/item/', \App\Actions\Categories\AddCategoryAction::class)->name('item.store');
//Route::delete('/item/{id}', \App\Actions\Categories\DeleteCategoryAction::class)->name('item.destroy');
