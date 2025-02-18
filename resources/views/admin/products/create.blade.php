@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Product</li>
        </ol>
    </nav>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mb-4 p-2">

        <div class="card-body">

            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- General Information -->
                <div class="row" style="gap: 15px;">
                    <div class="card mb-4 col" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <h5 class="card-header" style="background-color: transparent">General Information</h5>
                        <div class="card-body">
                            <div class="row">
                                <!-- SKU -->
                                <div class="col-md-6 mb-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" class="form-control text-primary" id="sku" name="sku"
                                        value="{{ $sku }}" readonly required>
                                </div>
                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            </div>
                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Product Status -->
                    <div class="card mb-4 col-4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <h5 class="card-header" style="background-color: transparent">Product Status</h5>
                        <div class="card-body">
                            <div class="row">
                                <!-- Is Published -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                                        value="1" {{ old('is_published') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">Is Published</label>
                                </div>
                                <!-- Is Enabled -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="is_enabled" name="is_enabled"
                                        value="1" {{ old('is_enabled') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_enabled">Is Enabled</label>
                                </div>
                                <!-- Is Featured -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured"
                                        value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Is Featured</label>
                                </div>
                                <!-- Generate License Code -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="generate_license_code"
                                        name="generate_license_code" value="1"
                                        {{ old('generate_license_code') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="generate_license_code">Generate License
                                        Code</label>
                                </div>
                                <!-- Allow Checkout When Out of Stock -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="allow_checkout_when_out_of_stock"
                                        name="allow_checkout_when_out_of_stock" value="1"
                                        {{ old('allow_checkout_when_out_of_stock') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="allow_checkout_when_out_of_stock">Allow Checkout
                                        When Out of Stock</label>
                                </div>
                                <!-- Is Taxable -->
                                <div class="col-md-6 mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="is_taxable" name="is_taxable"
                                        value="1" {{ old('is_taxable') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_taxable">Is Taxable</label>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Pricing & Inventory -->
                <div class="row">
                    <div class="card mb-4 col" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <h5 class="card-header" style="background-color: transparent">Pricing &amp; Inventory</h5>
                        <div class="card-body">
                            <!-- Inventory Section -->
                            <h6 class="card-header mb-3" style="background-color: transparent">Inventory</h6>
                            <div class="row">
                                <!-- Quantity -->
                                <div class="col-md-3 mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        value="{{ old('quantity') }}" min="0">
                                </div>
                                <!-- Minimum Order Quantity -->
                                <div class="col-md-3 mb-3">
                                    <label for="minimum_order_quantity" class="form-label">Min Order Quantity</label>
                                    <input type="number" class="form-control" id="minimum_order_quantity"
                                        name="minimum_order_quantity" value="{{ old('minimum_order_quantity') }}"
                                        min="0">
                                </div>
                                <!-- Maximum Order Quantity -->
                                <div class="col-md-3 mb-3">
                                    <label for="maximum_order_quantity" class="form-label">Max Order Quantity</label>
                                    <input type="number" class="form-control" id="maximum_order_quantity"
                                        name="maximum_order_quantity" value="{{ old('maximum_order_quantity') }}"
                                        min="0">
                                </div>
                                <!-- Threshold -->
                                <div class="col-md-3 mb-3">
                                    <label for="threshold" class="form-label">Threshold</label>
                                    <input type="number" class="form-control" id="threshold" name="threshold"
                                        value="{{ old('threshold') }}" min="0">
                                </div>
                            </div>

                            <!-- Pricing Section -->
                            <h6 class="card-header mb-3" style="background-color: transparent">Pricing</h6>
                            <div class="row">
                                <!-- Cost -->
                                <div class="col-md-3 mb-3">
                                    <label for="cost" class="form-label">Cost</label>
                                    <input type="number" step="0.01" class="form-control" id="cost"
                                        name="cost" value="{{ old('cost') }}" min="0">
                                </div>
                                <!-- Price -->
                                <div class="col-md-3 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="price"
                                        name="price" value="{{ old('price') }}" min="0">
                                </div>
                                <!-- Special Price -->
                                <div class="col-md-3 mb-3">
                                    <label for="special_price" class="form-label">Special Price</label>
                                    <input type="number" step="0.01" class="form-control" id="special_price"
                                        name="special_price" value="{{ old('special_price') }}" min="0">
                                </div>
                                <!-- Wholesale Price -->
                                <div class="col-md-3 mb-3">
                                    <label for="whole_sale_price" class="form-label">Wholesale Price</label>
                                    <input type="number" step="0.01" class="form-control" id="whole_sale_price"
                                        name="whole_sale_price" value="{{ old('whole_sale_price') }}" min="0">
                                </div>
                            </div>
                            <div class="row">
                                <!-- Sale Price -->
                                <div class="col-md-3 mb-3">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input type="number" step="0.01" class="form-control" id="sale_price"
                                        name="sale_price" value="{{ old('sale_price') }}" min="0">
                                </div>
                                <!-- Sale Criteria -->
                                <div class="col-md-3 mb-3">
                                    <label for="sale_criteria" class="form-label">Sale Criteria</label>
                                    <select class="form-select" id="sale_criteria" name="sale_criteria">
                                        <option value="NONE" {{ old('sale_criteria') == 'NONE' ? 'selected' : '' }}>None
                                        </option>
                                        <option value="DATE" {{ old('sale_criteria') == 'DATE' ? 'selected' : '' }}>Date
                                        </option>
                                        <option value="QUANTITY"
                                            {{ old('sale_criteria') == 'QUANTITY' ? 'selected' : '' }}>Quantity</option>
                                    </select>
                                </div>
                                <!-- Sale Start Date -->
                                <div class="col-md-3 mb-3">
                                    <label for="sale_start_date" class="form-label">Sale Start Date</label>
                                    <input type="date" class="form-control" id="sale_start_date"
                                        name="sale_start_date" value="{{ old('sale_start_date') }}">
                                </div>
                                <!-- Sale End Date -->
                                <div class="col-md-3 mb-3">
                                    <label for="sale_end_date" class="form-label">Sale End Date</label>
                                    <input type="date" class="form-control" id="sale_end_date" name="sale_end_date"
                                        value="{{ old('sale_end_date') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details & Dimensions -->
                <div class="row" style="gap: 15px;">
                    <!-- Product Details -->
                    <div class="card mb-4 col-md-9" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <h5 class="card-header" style="background-color: transparent">Product Details</h5>
                        <div class="card-body">
                            <div class="row">
                                <!-- Product Type -->
                                <div class="col-md-6 mb-3">
                                    <label for="product_type" class="form-label">Product Type</label>
                                    <select class="form-select" id="product_type" name="product_type" required>
                                        <option value="PHYSICAL"
                                            {{ old('product_type') == 'PHYSICAL' ? 'selected' : '' }}>Physical</option>
                                        <option value="DIGITAL" {{ old('product_type') == 'DIGITAL' ? 'selected' : '' }}>
                                            Digital</option>
                                    </select>
                                </div>
                                <!-- Barcode -->
                                <div class="col-md-6 mb-3">
                                    <label for="barcode" class="form-label">Barcode</label>
                                    <input type="text" class="form-control" id="barcode" name="barcode"
                                        value="{{ old('barcode') }}">
                                </div>
                                {{-- Tax ID --}}
                                <!-- Tax ID -->
                                <div class="col-md-6 mb-3">
                                    <label for="tax_id" class="form-label">Tax</label>
                                    <select class="form-select" id="tax_id" name="tax_id">
                                        <option value="">Select Tax</option>
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax->id }}"
                                                {{ old('tax_id') == $tax->id ? 'selected' : '' }}>{{ $tax->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <h5 class="card-header" style="background-color: transparent">Category &amp; Brand</h5>

                                <div class="row">
                                    <!-- Category -->
                                    <div class="col-md-4 mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select" id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Brand -->
                                    <div class="col-md-4 mb-3">
                                        <label for="brand_id" class="form-label">Brand</label>
                                        <select class="form-select" id="brand_id" name="brand_id">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Supplier -->
                                    <div class="col-md-4 mb-3">
                                        <label for="supplier_id" class="form-label">Supplier</label>
                                        <select class="form-select" id="supplier_id" name="supplier_id">
                                            <option value="">Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                    <!-- Dimensions & Weight -->
                    <div class="card mb-4 col" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <h5 class="card-header" style="background-color: transparent">Dimensions &amp; Weight</h5>
                        <div class="card-body">
                            <div class="row flex-column">
                                <!-- Length -->
                                <div class="col mb-3">
                                    <label for="length" class="form-label">Length</label>
                                    <input type="number" step="0.01" class="form-control" id="length"
                                        name="length" value="{{ old('length') }}" min="0">
                                </div>
                                <!-- Width -->
                                <div class="col mb-3">
                                    <label for="width" class="form-label">Width</label>
                                    <input type="number" step="0.01" class="form-control" id="width"
                                        name="width" value="{{ old('width') }}" min="0">
                                </div>
                                <!-- Height -->
                                <div class="col mb-3">
                                    <label for="height" class="form-label">Height</label>
                                    <input type="number" step="0.01" class="form-control" id="height"
                                        name="height" value="{{ old('height') }}" min="0">
                                </div>
                                <!-- Weight -->
                                <div class="col mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" step="0.01" class="form-control" id="weight"
                                        name="weight" value="{{ old('weight') }}" min="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Media -->
                <div class="row">
                    <div class="card mb-4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <h5 class="card-header" style="background-color: transparent">Media</h5>
                        <div class="card-body">
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="text" class="form-control" id="image" name="image"
                                    value="{{ old('image') }}">
                            </div>
                            <!-- Images -->
                            <div class="mb-3">
                                <label for="images" class="form-label">Images</label>
                                <input type="text" class="form-control" id="images" name="images"
                                    value="{{ old('images') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary col-3"><i class="fa-solid fa-right-to-bracket"></i> Create Product</button>
                </div>
            </form>

        </div>
    </div>

@endsection
