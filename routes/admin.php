<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BackOffice\BrandController;
use App\Http\Controllers\Admin\BackOffice\CategoryController;
use App\Http\Controllers\Admin\BackOffice\CompanyController;
use App\Http\Controllers\Admin\BackOffice\CustomerController;
use App\Http\Controllers\Admin\BackOffice\ProductController;
use App\Http\Controllers\Admin\BackOffice\SettingController;
use App\Models\Admin;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
    // return "<h1>Admin</h1>";
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

        #settings routes
        Route::get('settings', [SettingController::class, 'index'])->name('admin.settings');
        Route::get('settings/general', [SettingController::class, 'getGeneralSettings'])->name('admin.settings.general');
        Route::get('settings/email', [SettingController::class, 'getEmailSettings'])->name('admin.settings.email');
        Route::get('settings/appearance', [SettingController::class, 'getAppearanceSettings'])->name('admin.settings.appearance');
        Route::get('settings/payment', [SettingController::class, 'getPaymentSettings'])->name('admin.settings.payment');
        Route::get('settings/shipping', [SettingController::class, 'getShippingSettings'])->name('admin.settings.shipping');
        Route::get('settings/store', [SettingController::class, 'getStoreSettings'])->name('admin.settings.store');

        #customer routes
        Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers');
        Route::get('customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
        Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('admin.customers.show');
        Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('admin.customers.update');
        Route::post('customers', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
        Route::get('customer-search', [CustomerController::class, 'search'])->name('admin.customers.search');

        #order routes
        Route::get('orders', [CustomerController::class, 'orders'])->name('admin.orders');

        Route::get('orders/create', [CustomerController::class, 'createOrder'])->name('admin.orders.create');
        Route::post('orders', [CustomerController::class, 'storeOrder'])->name('admin.orders.store');
        Route::get('orders/{order}/edit', [CustomerController::class, 'editOrder'])->name('admin.orders.edit');
        Route::put('orders/{order}', [CustomerController::class, 'updateOrder'])->name('admin.orders.update');
        Route::delete('orders/{order}', [CustomerController::class, 'destroyOrder'])->name('admin.orders.destroy');
        Route::get('order-search', [CustomerController::class, 'searchOrder'])->name('admin.orders.search');
        Route::get('orders/{order}', [CustomerController::class, 'showOrder'])->name('admin.orders.show');
        Route::get('orders/{order}/invoice', [CustomerController::class, 'invoice'])->name('admin.orders.invoice');
        Route::get('orders/{order}/invoice/download', [CustomerController::class, 'downloadInvoice'])->name('admin.orders.invoice.download');
        Route::get('orders/{order}/invoice/print', [CustomerController::class, 'printInvoice'])->name('admin.orders.invoice.print');
        Route::get('orders/{order}/invoice/email', [CustomerController::class, 'emailInvoice'])->name('admin.orders.invoice.email');
        
        Route::post('settings/general/update-logo', [CompanyController::class, 'updateLogo'])->name('admin.settings.update-logo');
        Route::post('settings/general/update-info', [CompanyController::class, 'updateInfo'])->name('admin.settings.update-info');




    });
});
