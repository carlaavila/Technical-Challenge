<?php

use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Order\CreateOrderController;
use App\Http\Controllers\Payments\PaymentStatusController;
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

        Route::get('/success', [PaymentStatusController::class, 'success'])->name('success');
        Route::get('/failure', [PaymentStatusController::class, 'failure'])->name('failure');
        Route::get('/pending', [PaymentStatusController::class, 'pending'])->name('pending');

    }

);
Route::post('/notification', [NotificationsController::class, '__invoke'])->name('notification');


require __DIR__.'/auth.php';
