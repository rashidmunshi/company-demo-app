<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('products/create',[ProductController::class,'create'])->name('products.create');
Route::get('products',[ProductController::class,'index'])->name('products.index');
Route::post('products/store',[ProductController::class,'store'])->name('product.store');
