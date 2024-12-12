<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->name('products.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/details/{article}', 'details')->name('details');

    Route::get('/create', 'createShow')->name('create');
    Route::post('/create', 'create')->name('store');

    Route::get('/edit/{article}', 'editShow')->name('edit');
    Route::patch('/edit/{article}', 'edit')->name('update');

    Route::delete('/delete/{article}', 'destroy')->name('destroy');
});

Route::controller(ReceiptController::class)->prefix('receipts')->name('receipts.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'createShow')->name('create');
    Route::post('/create', 'create')->name('store');

    Route::get('/edit/{id}', 'editShow')->name('edit');
    Route::patch('/edit/{id}', 'edit')->name('update');

    Route::delete('/delete/{id}', 'destroy')->name('destroy');
});
