<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BackOffice\BrandController;
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

        #product routes
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

        #brand routes
        Route::get('brands', [BrandController::class, 'index'])->name('admin.brands');
        Route::get('brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::post('brands', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::get('brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::put('brands/{brand}', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

        #category routes
        // Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
        // Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        // Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        // Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        // Route::put('categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        
    });
});
