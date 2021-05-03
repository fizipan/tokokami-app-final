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
use App\Http\Controllers\Socialite\GoogleController;
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


// User Route
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home')->withoutMiddleware('auth');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories')->withoutMiddleware('auth');
    Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories-detail')->withoutMiddleware('auth');
    
    Route::get('/search', [SearchController::class, 'index'])->name('search')->withoutMiddleware('auth');
    
    Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product')->withoutMiddleware('auth');
    Route::post('/product/{id}', [ProductController::class, 'add'])->name('add-to-cart');
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/update', [CartController::class, 'update'])->name('cart-update');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');
    Route::patch('/cart/save/{id}', [CartController::class, 'save'])->name('cart-save');
    Route::patch('/cart/move/{id}', [CartController::class, 'move'])->name('cart-move');
    Route::get('/cart/shipment', [CartController::class, 'shipment'])->name('cart-shipment');
    
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout-success');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile-update');
    Route::patch('/profile/upload/{id}', [ProfileController::class, 'upload'])->name('profile-upload');
    
    Route::get('/order', [OrderController::class, 'index'])->name('order');
});

// Socialite Route
Route::prefix('auth')->group(function() {
    Route::get('redirect', [GoogleController::class, 'redirect'])->name('socialite-redirect');
    Route::get('google/callback', [GoogleController::class, 'callback'])->name('socialite-callback');
});

// Admin Route
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');
        Route::get('/transactions/export', [DashboardController::class, 'export'])->name('export-transaction');
        Route::resource('product', AdminProductController::class);
        Route::resource('product-gallery', AdminProductGalleryController::class);
        Route::resource('category', AdminCategoryController::class);
        Route::resource('transaction', AdminTransactionController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('payment', AdminPaymentController::class);
        Route::resource('account-number', AdminAccountNumberController::class);
    });


Auth::routes();
