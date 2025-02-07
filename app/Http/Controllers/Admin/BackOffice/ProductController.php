<?php

namespace App\Http\Controllers\Admin\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view with all products
        $products = Product::all();
        return view('admin.products.index', compact('products'));               

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view with form to create a new product
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'sku' => 'required|string|max:191|unique:products,sku',
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
            'quantity' => 'nullable|integer|min:0',
            'allow_checkout_when_out_of_stock' => 'boolean',
            'is_featured' => 'boolean',
            'brand_id' => 'nullable|exists:brands,id',
            'cost' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'sale_start_date' => 'nullable|date',
            'sale_end_date' => 'nullable|date|after_or_equal:sale_start_date',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'tax_id' => 'nullable|exists:taxes,id',
            'image' => 'nullable|string|max:191',
            'images' => 'nullable|string',
            'product_type' => 'required|in:PHYSICAL,DIGITAL',
            'barcode' => 'nullable|string|max:50',
            'generate_license_code' => 'boolean',
            'minimum_order_quantity' => 'integer|min:0',
            'maximum_order_quantity' => 'integer|min:0',
        ]);
    
        // Store product in database
        $product = Product::create($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
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
