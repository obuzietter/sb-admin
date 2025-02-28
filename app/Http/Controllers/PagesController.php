<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function shop()
    {
        $categories = Category::all();
        return view('shop.products', compact('categories'));
        
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
