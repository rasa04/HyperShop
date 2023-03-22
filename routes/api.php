<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\IndexController;
use App\Http\Controllers\API\StoreController;

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CategoryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'main')->name('main');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{product}', 'show')->name('products.show');
});
Route::controller(BrandController::class)->group(function () {
    Route::get('/brands', 'index')->name('brands.index');
    Route::get('/brands/{brand}', 'show')->name('brands.show');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('categories.show');
});

Route::resource('/blog', BlogController::class);

Route::resource('/shop', StoreController::class);
