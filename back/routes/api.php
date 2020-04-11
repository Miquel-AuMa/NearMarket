<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{order}', [OrderController::class, 'show']);
Route::post('/orders', [OrderController::class, 'store']);
Route::put('/orders/{order}', [OrderController::class, 'update']);
Route::delete('/orders/{order}', [OrderController::class, 'destroy']);

Route::get('/order-items', [OrderItemController::class, 'index']);
Route::get('/order-items/{orderItem}', [OrderItemController::class, 'show']);
Route::post('/order-items', [OrderItemController::class, 'store']);
Route::put('/order-items/{orderItem}', [OrderItemController::class, 'update']);
Route::delete('/order-items/{orderItem}', [OrderItemController::class, 'destroy']);

Route::get('/shop-types', [ShopTypeController::class, 'index']);
Route::get('/shop-types/{shopType}', [ShopTypeController::class, 'show']);
Route::post('/shop-types', [ShopTypeController::class, 'store']);
Route::put('/shop-types/{shopType}', [ShopTypeController::class, 'update']);
Route::delete('/shop-types/{shopType}', [ShopTypeController::class, 'destroy']);

Route::get('/shops', [ShopController::class, 'index']);
Route::get('/shops/{shop}', [ShopController::class, 'show']);
Route::post('/shops', [ShopController::class, 'store']);
Route::put('/shops/{shop}', [ShopController::class, 'update']);
Route::delete('/shops/{shop}', [ShopController::class, 'destroy']);

