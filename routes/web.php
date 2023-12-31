<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product',[ProductController::class,'index'])->name('product.index');

Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');

Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');


Route::post('/product/store',[ProductController::class,'store'])->name('product.store');

Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');