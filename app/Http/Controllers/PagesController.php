<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function shop()
    {
        $categories = Category::all();
        $products = Product::where('is_enabled', 1)->paginate(20);
        return view('shop.products', compact('categories', 'products'));
        
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }
}
