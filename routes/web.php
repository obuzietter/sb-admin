<?php

require __DIR__ . '/admin.php';

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Shop\CartItemController;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/products', [PagesController::class, 'products'])->name('products');

Route::get('/product-detail', function () {

    return view('shop.product-detail');
})->name('product.show');

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// cart routes

Route::get('cart', [PagesController::class, 'cart'])->name('cart');

Route::post('cart-item-store', [CartItemController::class, 'store'])->name('cart.item.store');

Route::delete('cart-item-delete/{id}', [CartItemController::class, 'destroy'])->name('cart.item.delete');
Route::put('cart-item-update/{id}', [CartItemController::class, 'update'])->name('cart.item.update');

Route::get('/checkout', function () {

    return view('shop.checkout');
})->name('checkout');


Route::get('profile', [PagesController::class, 'profile'])->name('profile');

// search products
Route::get('/search', [PagesController::class, 'productSearch'])->name('product.search');


Route::middleware('guest:user')->group(function () {

    Route::post('/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');

    Route::get('/register/show', function () {
        return view('shop.register');
    })->name('register.show');

    Route::get('/login/show', function () {
        return view('shop.login');
    })->name('login.show');
});
