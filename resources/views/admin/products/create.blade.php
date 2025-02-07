@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Add New Product</h2>
    <form method="POST" action="/products/store">
        <div class="card p-4">
            <!-- Product Details Palette -->
            <fieldset class="border p-3 mb-4">
                <legend class="float-none w-auto px-2">Product Details</legend>
                <div class="mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku') }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
            </fieldset>
            
            <!-- Pricing Palette -->
            <fieldset class="border p-3 mb-4">
                <legend class="float-none w-auto px-2">Pricing</legend>
                <div class="row">
                    <div class="col-md-4">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" id="cost" name="cost" class="form-control" step="0.01" value="{{ old('cost') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="sale_price" class="form-label">Sale Price</label>
                        <input type="number" id="sale_price" name="sale_price" class="form-control" step="0.01" value="{{ old('sale_price') }}">
                    </div>
                </div>
            </fieldset>
            
            <!-- Stock & Availability Palette -->
            <fieldset class="border p-3 mb-4">
                <legend class="float-none w-auto px-2">Stock & Availability</legend>
                <div class="row">
                    <div class="col-md-4">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', 0) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="minimum_order_quantity" class="form-label">Min Order Quantity</label>
                        <input type="number" id="minimum_order_quantity" name="minimum_order_quantity" class="form-control" value="{{ old('minimum_order_quantity', 0) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="maximum_order_quantity" class="form-label">Max Order Quantity</label>
                        <input type="number" id="maximum_order_quantity" name="maximum_order_quantity" class="form-control" value="{{ old('maximum_order_quantity', 0) }}">
                    </div>
                </div>
            </fieldset>
            
            <!-- Product Type Palette -->
            <fieldset class="border p-3 mb-4">
                <legend class="float-none w-auto px-2">Product Type</legend>
                <div class="mb-3">
                    <label for="product_type" class="form-label">Type</label>
                    <select id="product_type" name="product_type" class="form-select">
                        <option value="PHYSICAL" {{ old('product_type') == 'PHYSICAL' ? 'selected' : '' }}>Physical</option>
                        <option value="DIGITAL" {{ old('product_type') == 'DIGITAL' ? 'selected' : '' }}>Digital</option>
                    </select>
                </div>
            </fieldset>
            
            <!-- Other Details Palette -->
            <fieldset class="border p-3 mb-4">
                <legend class="float-none w-auto px-2">Other Details</legend>
                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input type="text" id="barcode" name="barcode" class="form-control" value="{{ old('barcode') }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
            </fieldset>
            
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection