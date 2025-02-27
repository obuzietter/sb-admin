<?php

require __DIR__ . '/admin.php';

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {

    return view('shop.home');
})->name('home');

Route::get('/products', function () {

    return view('shop.products');
})->name('products');

Route::get('/product-detail', function () {

    return view('shop.product-detail');
})->name('product.show');

Route::get('/contact', function () {

    return view('shop.contact');
})->name('contact');

Route::get('/cart', function () {

    return view('shop.cart');
})->name('cart');

Route::get('/checkout', function () {

    return view('shop.checkout');
})->name('checkout');

// Generate slug if not provided
// Route::get('/slug-generate', function () {

//     $categories = Category::all();

//     foreach ($categories as $cat) {
//         $slug = Str::slug($cat->name);
//         $cat->slug = $slug;
//         $cat->save();
//     }

//     return 'Slug generated successfully';
// });



// Route::get('/sku-update', function () {
   
//     // Fetch products without an SKU
//     $products = Product::whereNull('sku')->get();

//     $updates = [];
//     foreach ($products as $product) {
//         $sku = 'SKU-' . now()->format('Ymd') . '-' . Str::random(6); // Generate SKU

//         $updates[] = [
//             'id' => $product->id,
//             'sku' => $sku,
//             'name' => $product->name ?? 'Unnamed Product' // Ensure name is not NULL
//         ];
//     }

//     // Batch update using a single query
//     DB::table('products')->upsert($updates, ['id'], ['sku', 'name']);

//     return count($updates) . ' SKU updated successfully';
// });
