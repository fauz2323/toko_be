<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/product', [App\Http\Controllers\Api\ProductController::class, 'getAllProduct']);
    Route::get('/category', [App\Http\Controllers\Api\ProductController::class, 'getCategory']);
    Route::post('/product/detail', [App\Http\Controllers\Api\ProductController::class, 'getDetailProduct']);
    Route::post('/product/category', [App\Http\Controllers\Api\ProductController::class, 'getProductByCategory']);
});
