<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BeritaController;


Route::get('/', function () {
    return view('welcome');
});

//rute -> jalur -> jalan, arah 
Route::get('/hello', function () {
    return '<h1>Hello World.. belajar laravel</h1>';
});

//rute dari controller
Route::get('hello',[SiswaController::class, 'index']);
Route::get('hello/{jurusan}',[SiswaController::class, 'jurusan']);
Route::get('getmapel',[SiswaController::class, 'mapel']);

//categories 
Route::get('categories',[CategoryController::class,'index'])->name('category.index');


//berita 
Route::get('news', [BeritaController::class,'index'])->name('berita.index');
Route::get('create-news', [BeritaController::class,'create'])->name('berita.create');
Route::post('store-news', [BeritaController::class,'store'])->name('berita.store');
Route::get('edit-news/{id}', [BeritaController::class,'edit'])->name('berita.edit');
Route::get('delete-news/{id}',[BeritaController::class,'destroy'])->name('berita.delete');