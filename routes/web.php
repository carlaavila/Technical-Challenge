<?php

use App\Http\Controllers\Order\CreateOrderController;
use App\Http\Controllers\Product\CreateProductController;
use App\Http\Controllers\Product\ListProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', [ListProductController::class, 'index'])->name('dashboard');
        Route::get('/create-product', [CreateProductController::class, 'index'])->name('createProduct');
        Route::post('/create-product', [CreateProductController::class, 'store'])->name('createProduct');
        Route::get('/create-order/{id}', [CreateOrderController::class, 'index'])->name('createOrder');
        Route::post('/create-order/{id}', [CreateOrderController::class, 'store'])->name('createOrder');


    }
);


require __DIR__.'/auth.php';
