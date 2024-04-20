<?php


use Illuminate\Support\Facades\Route;

Route::get('/item/{id}', \App\Actions\Items\GetItemsAction::class)->name('item.index');
Route::delete('/item/{id}', \App\Actions\Items\DeleteItemAction::class)->name('item.destroy');
//Route::post('/item/', \App\Actions\Categories\AddCategoryAction::class)->name('item.store');
