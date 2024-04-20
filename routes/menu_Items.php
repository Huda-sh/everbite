<?php


use Illuminate\Support\Facades\Route;

Route::get('/item/{id}', \App\Actions\Items\GetItemsAction::class)->name('item.index');
Route::post('/item/{id}', \App\Actions\Items\AddItemAction::class)->name('item.store');
Route::delete('/item/{id}', \App\Actions\Items\DeleteItemAction::class)->name('item.destroy');
