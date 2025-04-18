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
