<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::put('/payments/{id}', [PaymentController::class, 'update']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);

Route::get('/user/info', [UserController::class, 'fetchUserInfo']);

Route::get('products', [ProductController::class, 'fetchProducts']);
Route::get('products/{id}', [ProductController::class, 'fetchProductById']);
Route::post('products', [ProductController::class, 'createProduct']);
Route::put('products/{id}', [ProductController::class, 'updateProduct']);
Route::delete('products/{id}', [ProductController::class, 'deleteProduct']);

