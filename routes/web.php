<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use  App\Http\Controllers\StoreController;
use App\Http\Controllers\BlogController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/cart', [IndexController::class, 'cart'])->name('cart');
Route::get('/checkout', [IndexController::class, 'checkout'])->name('checkout');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

Route::resource('/blog', BlogController::class);

Route::resource('/shop', StoreController::class);
