<?php

require __DIR__ . '/admin.php';

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    // return redirect()->route('admin.dashboard');
    return view('shop.home');
});


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
