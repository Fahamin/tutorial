<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('index');
});

Route::get('/shopList', [ShopController::class, 'index'])->name('shop.index');

// Route to create a new shop (form display)

Route::get('/shop.crete', [ShopController::class, 'create'])->name('shop.create');

Route::post('/shop.store', [ShopController::class, 'store'])->name('shop.store');