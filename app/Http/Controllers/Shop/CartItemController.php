<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //
        $userId = Auth::id();
        $sessionId = session()->getId();

        // Check if item already exists
        $cartItem = CartItem::where('product_id', $request->product_id)
            ->when($userId, fn ($query) => $query->where('user_id', $userId))
            ->when(!$userId, fn ($query) => $query->where('session_id', $sessionId))
            ->first();

        if ($cartItem) {
            // If item exists, update quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->total_price = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            // Otherwise, add new item
            CartItem::create([
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_image' => $request->product_image,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total_price' => $request->quantity * $request->price,
                'attributes' => json_encode($request->attributes),
            ]);
        }

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
