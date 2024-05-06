<?php

use Apydevs\Products\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
Route::middleware([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    // Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    // Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    // Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
    // Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    // Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
    // Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
});
