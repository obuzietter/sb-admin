<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BackOffice\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('show.admin.login');
        Route::get('register', [AuthController::class, 'showRegister'])->name('show.admin.register');
        Route::post('login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('register', [AuthController::class, 'register'])->name('admin.register');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        //product routes
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        

    });
});
