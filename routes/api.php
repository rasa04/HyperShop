<?php

use App\Http\Controllers\API\FilterListController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CategoryController;

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

// PUBLIC ROUTES
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/filters',FilterListController::class);
Route::resource('/blog', BlogController::class);

Route::group(["prefix" => "/products", "controller" => ProductController::class], function () {
    Route::post('/', 'index');
    Route::get('/{product}', 'show');
});
Route::controller(BrandController::class)->group(function () {
    Route::get('/brands', 'index')->name('brands.index');
    Route::get('/brands/{brand}', 'show')->name('brands.show');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('categories.show');
});

// PROTECTED ROUTES
Route::group(['middleware' => 'auth:sanctum', 'controller' => AuthController::class], function () {
    Route::get('/users', 'user');
    Route::post('/logout', 'logout');
});
