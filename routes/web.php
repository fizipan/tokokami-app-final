<?php

use App\Http\Controllers\Admin\AccountNumberController as AdminAccountNumberController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductGalleryController as AdminProductGalleryController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/shipment', [CartController::class, 'shipment'])->name('cart-shipment');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/order', [OrderController::class, 'index'])->name('order');

// Admin Route
Route::prefix('admin')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');
        Route::resource('product', AdminProductController::class);
        Route::resource('product-gallery', AdminProductGalleryController::class);
        Route::resource('category', AdminCategoryController::class);
        Route::resource('transaction', AdminTransactionController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('payment', AdminPaymentController::class);
        Route::resource('account-number', AdminAccountNumberController::class);
    });


Auth::routes();
