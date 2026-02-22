<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Shop Routes
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('shop/{category:slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('shop/{category:slug}/{subcategory:slug}', [ShopController::class, 'subcategory'])->name('shop.subcategory');

// Product Routes
Route::get('product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

// Cart Routes
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

// Account Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::get('account/wishlist', [AccountController::class, 'wishlist'])->name('account.wishlist');
    Route::get('account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('account/addresses', [AccountController::class, 'addresses'])->name('account.addresses');
});

require __DIR__.'/settings.php';
