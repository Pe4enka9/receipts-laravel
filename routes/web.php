<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/create', [ProductController::class, 'createShow'])->name('products.create');
Route::post('/create', [ProductController::class, 'create'])->name('products.store');

Route::get('/edit/{article}', [ProductController::class, 'editShow'])->name('products.edit');
Route::patch('/edit/{article}', [ProductController::class, 'edit'])->name('products.update');

Route::delete('/delete/{article}', [ProductController::class, 'destroy'])->name('products.destroy');
