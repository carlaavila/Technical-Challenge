<?php

use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Order\CreateOrderController;
use App\Http\Controllers\Payments\PaymentStatusController;
use App\Http\Controllers\Product\CreateProductController;
use App\Http\Controllers\Product\DeleteProductController;
use App\Http\Controllers\Product\ListProductController;
use App\Http\Controllers\Product\UpdateProductController;
use Illuminate\Support\Facades\Route;



//Route::get('/', function () {
//    return view('dashboard');
//});
Route::get('/', [ListProductController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
       // Route::get('/dashboard', [ListProductController::class, 'index'])->name('dashboard');
        Route::get('/create-product', [CreateProductController::class, 'index'])->name('createProductView');
        Route::post('/create-product', [CreateProductController::class, 'store'])->name('createProduct');
        Route::get('/product/{id}',[UpdateProductController::class, 'viewData'])->name('editProduct');
        Route::put('/product/{id}', [UpdateProductController::class, 'edit'])->name('updateProduct');
        Route::delete('/product/{id}', [DeleteProductController::class, 'delete'])->name('deleteProduct');

        Route::get('/create-order/{id}', [CreateOrderController::class, 'index'])->name('createOrderView');
        Route::post('/create-order/{id}', [CreateOrderController::class, 'store'])->name('createOrder');

        Route::get('/afterCheckout', [PaymentStatusController::class, '__invoke'])->name('afterCheckout');

    }

);
        Route::post('/notification', [NotificationsController::class, '__invoke'])->name('notification');


require __DIR__.'/auth.php';
