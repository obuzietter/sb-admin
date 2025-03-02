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
        Log::info('store() function called');
    
        // Log raw request data
        Log::info('Request Data:', $request->all());
    
        $userId = Auth::id();
        $sessionId = session()->getId();
    
        Log::info("User ID: " . ($userId ?? 'Guest') . ", Session ID: $sessionId");
    
        // Validate request structure
        if (!isset($request->product) || !isset($request->product['id'])) {
            Log::error('Product data is missing in the request');
            return response()->json(['error' => 'Product data is missing'], 400);
        }
    
        // Check if item already exists in cart
        Log::info('Checking if product exists in cart...');
        $cartItem = CartItem::where('product_id', $request->product['id'])
            ->when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })
            ->when(!$userId, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->first();
    
        Log::info($cartItem ? 'Item exists in cart' : 'Item not found, creating new one');
    
        if ($cartItem) {
            // If item exists, update quantity
            Log::info("Updating existing cart item ID: {$cartItem->id}");
    
            $cartItem->quantity += $request->product['quantity'];
            $cartItem->total_price = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
    
            Log::info("Updated cart item: Quantity = {$cartItem->quantity}, Total Price = {$cartItem->total_price}");
        } else {
            // Otherwise, add new item
            Log::info('Adding new cart item...');
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
    
            Log::info("New cart item created: ID = {$newCartItem->id}");
        }
    
        Log::info('Returning success response');
        return response()->json(['message' => 'Item added to cart']);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
