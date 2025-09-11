<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('index');
});

// Route::get('/shopList', [ShopController::class, 'index'])->name('shop.index');

// // Route to create a new shop (form display)

// Route::get('/shop.crete', [ShopController::class, 'create'])->name('shop.create');

// Route::post('/shop.store', [ShopController::class, 'store'])->name('shop.store');

// Route::get('/shop.edit/{id}', [ShopController::class, 'edit'])->name('shop.edit');

// Route::put('/shop.update/{id}', [ShopController::class, 'update'])->name('shop.update');

// Route::delete('/shop.destroy/{id}', [ShopController::class, 'destroy'])->name('shop.destroy');


Route::prefix('/shop')->name('shop.')->group(function () {
    Route::get('/list', [ShopController::class, 'index'])->name('index');
    Route::get('/create', [ShopController::class, 'create'])->name('create');
    Route::post('/store', [ShopController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ShopController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ShopController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [ShopController::class, 'destroy'])->name('destroy');
});


Route::prefix('/customer')->name('customer.')->group(function () {
    Route::get('/list', [CustomerController::class, 'index'])->name('index');
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/store', [CustomerController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');
});