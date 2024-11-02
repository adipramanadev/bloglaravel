<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\AuthController;

// Public login route
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');

// Public route for testing
Route::get('hello', function () {
    return 'Hello, World!';
});

// Routes protected by Sanctum (authenticated users only)
// Route::middleware(['web','auth:sanctum'])->group(function () {
   
//     // Return authenticated user
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });

    
// });
// Categories routes
Route::get('categories', [ApiCategoryController::class, 'index']);
Route::post('categories', [ApiCategoryController::class, 'store']);
Route::delete('destroycategories/{id}', [ApiCategoryController::class, 'destroy']);
Route::put('put-categories/{id}', [ApiCategoryController::class, 'update']);

// Products routes
Route::get('products', [ApiProductController::class, 'index']);
Route::post('products', [ApiProductController::class, 'store']);
Route::put('put-products/{id}', [ApiProductController::class, 'update']);
Route::delete('destroy-product/{id}', [ApiProductController::class, 'destroy']);

// Orders routes
Route::apiResource('get-order', ApiOrderController::class);