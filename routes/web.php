<?php

use App\Http\Controllers\CreateProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', [CreateProductController::class, 'index'])->name('dashboard');
        Route::post('/dashboard', [CreateProductController::class, 'create'])->name('createProduct');

    }
);


require __DIR__.'/auth.php';
