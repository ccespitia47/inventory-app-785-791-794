<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Route::get('/usuario' , function(){
//     return "Hola Mundo";
// });
Route::get('/usuario/{nombre_usuario?}' , [PersonaController::class ,'mostrar'])->where('nombre_usuario', '[A-Za-z]+');

Route::get('/products', [ProductController::class, 'show']);

Route::get('/product/form/{id?}',[ProductController::class, 'form'])->name('product.form');

Route::post('/product/save',[ProductController::class, 'save'])->name('product.save');

Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/brands' , [BrandsController::class ,'show']);
