<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/create', [ProductController::class, 'createShow'])->name('products.create');
Route::post('/create', [ProductController::class, 'create'])->name('products.store');

Route::get('/edit/{article}', [ProductController::class, 'editShow'])->name('products.edit');
Route::patch('/edit/{article}', [ProductController::class, 'edit'])->name('products.update');

Route::delete('/delete/{article}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/receipts', [ReceiptController::class, 'index'])->name('receipts.index');

Route::get('/receipts/create', [ReceiptController::class, 'createShow'])->name('receipts.create');
Route::post('/receipts/create', [ReceiptController::class, 'create'])->name('receipts.store');

Route::get('/receipts/edit/{id}', [ReceiptController::class, 'editShow'])->name('receipts.edit');
Route::patch('/receipts/edit/{id}', [ReceiptController::class, 'edit'])->name('receipts.update');

Route::delete('/receipts/delete/{id}', [ReceiptController::class, 'destroy'])->name('receipts.destroy');
