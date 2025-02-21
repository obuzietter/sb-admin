<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BackOffice\BrandController;
use App\Http\Controllers\Admin\BackOffice\CategoryController;
use App\Http\Controllers\Admin\BackOffice\ProductController;
use App\Models\Admin;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
    // return "<h1>Admin</h1>";
});
Route::get('/admini', function () {
    // return redirect()->route('admin.dashboard');
    return "<h1>Admin</h1>";
});


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
            $products = Product::count();
            $brands = Brand::count();
            $categories = Category::count();
            $admins = Admin::count();

            return view('admin.dashboard', compact('products', 'brands', 'categories', 'admins'));
        })->name('admin.dashboard');

        #product routes
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        Route::get('product-search', [ProductController::class, 'search'])->name('admin.products.search');

        #brand routes
        Route::get('brands', [BrandController::class, 'index'])->name('admin.brands');
        Route::get('brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::post('brands', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::get('brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::put('brands/{brand}', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');
        Route::get('brand-search', [BrandController::class, 'search'])->name('admin.brands.search');

        #category routes
        Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        Route::get('category-search', [CategoryController::class, 'search'])->name('admin.categories.search');
        Route::post('categories/update-order', [CategoryController::class, 'updateOrder'])->name('admin.categories.updateOrder');
    });
});
