<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\OrderController;
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

// More Product
Route::get('/more', [CategoryController::class, 'more'])->name('api-more-product');

// Check User Available
Route::get('register/check', [RegisterController::class, 'check'])->name('api-check-user');

// Location
Route::get('regency/{id}',[LocationController::class, 'regency'])->name('api-get-regency');

// Cart Get
Route::get('cart/get',[CartController::class, 'getCart'])->name('api-get-cart');

// Get Payment
Route::get('order/payment',[OrderController::class, 'getPayment'])->name('api-get-payment');

Route::get('order/detail',[OrderController::class, 'getDetail'])->name('api-get-detail');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
