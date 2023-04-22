<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Product;
use App\Http\Controllers\Category;
use App\Http\Controllers\Brand;
use App\Http\Controllers\User;
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

Route::get('/', IndexController::class)->name('main.index');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', Category\IndexController::class)->name('category.index');
    Route::get('/create', Category\CreateController::class)->name('category.create');
    Route::get('/{category}', Category\ShowController::class)->name('category.show');
    Route::get('/edit/{category}', Category\EditController::class)->name('category.edit');
    Route::post('/', Category\StoreController::class)->name('category.store');
    Route::patch('/{category}', Category\UpdateController::class)->name('category.update');
    Route::delete('/{category}', Category\DeleteController::class)->name('category.delete');
});

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', Brand\IndexController::class)->name('brand.index');
    Route::get('/create', Brand\CreateController::class)->name('brand.create');
    Route::get('/{brand}', Brand\ShowController::class)->name('brand.show');
    Route::get('/edit/{brand}', Brand\EditController::class)->name('brand.edit');
    Route::post('/', Brand\StoreController::class)->name('brand.store');
    Route::patch('/{brand}', Brand\UpdateController::class)->name('brand.update');
    Route::delete('/{brand}', Brand\DeleteController::class)->name('brand.delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', User\IndexController::class)->name('user.index');
    Route::get('/create', User\CreateController::class)->name('user.create');
    Route::get('/{user}', User\ShowController::class)->name('user.show');
    Route::get('/edit/{user}', User\EditController::class)->name('user.edit');
    Route::post('/', User\StoreController::class)->name('user.store');
    Route::patch('/{user}', User\UpdateController::class)->name('user.update');
    Route::delete('/{user}', User\DeleteController::class)->name('user.delete');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', Product\IndexController::class)->name('product.index');
    Route::get('/create', Product\CreateController::class)->name('product.create');
    Route::get('/{product}', Product\ShowController::class)->name('product.show');
    Route::get('/edit/{product}', Product\EditController::class)->name('product.edit');
    Route::post('/', Product\StoreController::class)->name('product.store');
    Route::patch('/{product}', Product\UpdateController::class)->name('product.update');
    Route::delete('/{product}', Product\DeleteController::class)->name('product.delete');
});
