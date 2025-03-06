<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get user ID and session ID
        $userId = Auth::id();
        $sessionId = session()->getId();

        // Validate request structure
        if (!isset($request->product) || !isset($request->product['id'])) {
            return response()->json(['error' => 'Product data is missing'], 400);
        }

        // Check if item already exists in cart
        $cartItem = CartItem::where('product_id', $request->product['id'])
            ->when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })
            ->when(!$userId, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->first();

        if ($cartItem) {
            // If item exists, update quantity
            $cartItem->quantity += $request->product['quantity'];
            $cartItem->total_price = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            // Otherwise, add new item
            $newCartItem = CartItem::create([
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
                'product_id' => $request->product['id'],
                'product_name' => $request->product['name'] ?? 'Unknown Product',
                'product_image' => $request->product['image'] ?? 'no-image.jpg',
                'price' => $request->product['price'] ?? 0,
                'quantity' => $request->product['quantity'] ?? 1,
                'total_price' => ($request->product['price'] ?? 0) * ($request->product['quantity'] ?? 1)
            ]);
        }

        //get total cart count by getting the sum of the qunatity for all the columns
        $totalCartItems = CartItem::where('user_id', $userId)
            ->orWhere('session_id', $sessionId)
            ->sum('quantity');

        return response()->json([
            'message' => 'Item added to cart',
            'total_cart_items' => $totalCartItems
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Get user ID and session ID
        $userId = Auth::id();
        $sessionId = session()->getId();

        $cartItem = CartItem::where('product_id', $id)->first();

        // dd($cartItem);


        $cartItem->quantity = $request->quantity;
        $cartItem->total_price = $cartItem->quantity * $cartItem->price;
        $cartItem->save();

        //get total cart count by getting the sum of the qunatity for all the columns
        $totalCartItems = CartItem::where('user_id', Auth::id())
            ->when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })
            ->when(!$userId, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->sum('quantity');

        return response()->json([
            'message' => 'Item updated in cart',
            'total_cart_items' => $totalCartItems
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete the item from the cart where product_id is equal to the id
        $cartItem = CartItem::where('product_id', $id)
            ->where('user_id', Auth::id())
            ->orWhere('session_id', session()->getId())
            ->first();
        $cartItem->delete();

        //get total cart count by getting the sum of the qunatity for all the columns
        $totalCartItems = CartItem::where('user_id', Auth::id())
            ->orWhere('session_id', session()->getId())
            ->sum('quantity');

        return response()->json([
            'message' => 'Item removed from cart',
            'total_cart_items' => $totalCartItems
        ]);
    }
}
