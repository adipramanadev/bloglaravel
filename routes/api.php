<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategoryController;


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
