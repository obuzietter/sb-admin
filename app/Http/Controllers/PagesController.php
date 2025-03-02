<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Shop\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function cart(){
        // Get user ID and session ID
        $userId = Auth::id();
        $sessionId = session()->getId();

        //get total cart count by getting the sum of the qunatity for all the columns
        $cartItems = CartItem::where('user_id', $userId)
            ->orWhere('session_id', $sessionId)->get();


        
        return view('shop.cart', compact('cartItems'));
    }
}
