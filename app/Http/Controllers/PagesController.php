<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Shop\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // Define user ID and session ID
    protected $userId, $sessionId;

    public function __construct()
    {
        // Get user ID and session ID
        $this->userId = Auth::id();
        $this->sessionId = session()->getId();
    }

    public function home()
    {
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');
        return view('shop.home', compact('totalCartItems'));
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

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');

        return view('shop.contact', compact('totalCartItems'));
    }

    public function cart()
    {
        // Get user ID and session ID
        $userId = Auth::id();
        $sessionId = session()->getId();

        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');

        $cartItems = CartItem::where('user_id', $userId)
            ->orWhere('session_id', $sessionId)->get();



        return view('shop.cart', compact('cartItems', 'totalCartItems'));
    }

    public function checkout()
    {
        $subTotal = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('total_price');
        $cartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->get();
        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');
        return view('shop.checkout', compact('totalCartItems', 'cartItems', 'subTotal'));
    }

    public function profile()
    {
        $user = User::find($this->userId);

        $totalCartItems = CartItem::where('user_id', $this->userId)
            ->orWhere('session_id', $this->sessionId)
            ->sum('quantity');
        return view('shop.profile', compact('totalCartItems', 'user'));
    }
}
