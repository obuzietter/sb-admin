<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Shop\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Define user ID and session ID
    protected $userId, $sessionId;

    public function __construct()
    {
        // Get user ID and session ID
        $this->userId = Auth::id();
        $this->sessionId = session()->getId();
    }
    public function products()
    {
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');

        $categories = Category::all();
        $products = Product::where('is_enabled', 1)->paginate(20);
        $featuredProducts = Product::where('is_enabled', 1)->where('is_featured', 1)->get();
        return view('shop.products', compact('categories', 'products', 'totalCartItems', 'featuredProducts'));
    }
    public function productSearch(Request $request)
    {
        $featuredProducts = Product::where('is_enabled', 1)->where('is_featured', 1)->get();
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');
        $categories = Category::all();
        $search = $request->search;
        $products = Product::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })
            ->where('is_enabled', 1) // Ensures only enabled products are fetched
            ->paginate(20);

        return view('shop.products', compact('categories', 'products', 'totalCartItems', 'featuredProducts'));
    }
    public function showProduct($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');
        return view('shop.product-detail', compact('product', 'totalCartItems', 'categories'));
    }
    public function showProductByCategory($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(20);
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');
        $featuredProducts = Product::where('is_enabled', 1)->where('is_featured', 1)->get();

        return view('shop.products', compact('products', 'totalCartItems', 'categories', 'featuredProducts'));
    }
}
