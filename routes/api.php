<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('hello', function () {
    return  'Hello, World!';
});

//api categories 
Route::get('categories', [ApiCategoryController::class,'index']);
Route::post('categories', [ApiCategoryController::class,'store']);
Route::delete('destroycategories/{id}', [ApiCategoryController::class,'destroy']);
Route::put('put-categories/{id}', [ApiCategoryController::class,'update']);

//product 
Route::get('products', [ApiProductController::class,'index']);
Route::post('products', [ApiProductController::class,'store']);
Route::put('put-products/{id}', [ApiProductController::class,'update']);
Route::delete('destroy-product/{id}', [ApiProductController::class,'destroy']);

//order 
Route::apiResource('get-order', ApiOrderController::class);