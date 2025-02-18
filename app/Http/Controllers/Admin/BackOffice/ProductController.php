<?php

namespace App\Http\Controllers\Admin\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Supplier;
use App\Models\Admin\Tax;
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
        //return view with generated sku, taxes, brands and form to create a new product
        do{
            $sku = strtoupper("sku") . '-' . date("Ymd") . '-' . str_pad(rand(1, 999), 4, "0", STR_PAD_LEFT);
        }while(Product::where('sku', $sku)->exists());
        

        $taxes = Tax::all();
        $brands = Brand::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.products.create', compact('taxes', 'brands', 'sku', 'categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            // General Information
            'sku'             => 'required|string|max:191|unique:products,sku',
            'name'            => 'required|string|max:191',
            'description'     => 'nullable|string',
            'content'         => 'nullable|string',
        
            // Pricing & Inventory
            'quantity'                => 'nullable|integer|min:0',
            'minimum_order_quantity'  => 'nullable|integer|min:0',
            'maximum_order_quantity'  => 'nullable|integer|min:0',
            'threshold'               => 'nullable|integer|min:0',
            'cost'                    => 'nullable|numeric|min:0',
            'price'                   => 'nullable|numeric|min:0',
            'special_price'           => 'nullable|numeric|min:0',
            'whole_sale_price'        => 'nullable|numeric|min:0',
            'sale_price'              => 'nullable|numeric|min:0',
            'sale_start_date'         => 'nullable|date',
            'sale_end_date'           => 'nullable|date|after_or_equal:sale_start_date',
            'sale_criteria'           => 'nullable|in:NONE,DATE,QUANTITY',
        
            // Product Status
            'is_published'                => 'boolean',
            'is_enabled'                  => 'boolean',
            'is_featured'                 => 'boolean',
            'generate_license_code'       => 'boolean',
            'allow_checkout_when_out_of_stock' => 'boolean',
        
            // Tax Information
            'is_taxable'      => 'boolean',
            'tax_id'          => 'nullable|exists:taxes,id',
        
            // Category & Brand
            'category_id'     => 'nullable|exists:categories,id',
            'brand_id'        => 'nullable|exists:brands,id',
            'supplier_id'     => 'nullable|exists:suppliers,id',
        
            // Product Details
            'product_type'    => 'required|in:PHYSICAL,DIGITAL',
            'barcode'         => 'nullable|string|max:50',
        
            // Dimensions & Weight
            'length'          => 'nullable|numeric|min:0',
            'width'           => 'nullable|numeric|min:0',
            'height'          => 'nullable|numeric|min:0',
            'weight'          => 'nullable|numeric|min:0',
        
            // Media
            'image'           => 'nullable|string|max:191',
            'images'          => 'nullable|string',
        ]);
        
    
        // Store product in database
        $product = Product::create($validatedData);
    
        return redirect()->route('admin.products.create')->with('success', 'Product Created Successfully!');
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
        //show the editing form with the product data
        $product = Product::findOrFail($id);
        $taxes = Tax::all();
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'taxes', 'brands'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update the product in the database
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            // 'sku' => 'required|string|max:191|unique:products,sku,' . $product->id,
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

        $product->update($validatedData);

        return redirect()->route('admin.products.create')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the product from the database
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product Deleted Successfully!');
    }
}
