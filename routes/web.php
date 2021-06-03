<?php

use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\Product\ListProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', [ListProductController::class, 'index'])->name('dashboard');
        Route::post('/create-product', [CreateProductController::class, 'store'])->name('createProduct');


    }
);


require __DIR__.'/auth.php';
