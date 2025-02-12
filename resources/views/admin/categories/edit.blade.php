@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="container mt-5">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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


        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- General Information -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    General Information
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- SKU -->
                        <div class="col-md-6 mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku"
                                value="{{ $product->sku }}" readonly required>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content">{{ $product->content }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Pricing & Inventory -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Pricing & Inventory
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Quantity -->
                        <div class="col-md-4 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                value="{{ $product->quantity }}" min="0">
                        </div>

                        <!-- Cost -->
                        <div class="col-md-4 mb-3">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" step="0.01" class="form-control" id="cost" name="cost"
                                value="{{ $product->cost }}" min="0">
                        </div>

                        <!-- Price -->
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price"
                                value="{{ $product->price }}" min="0">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Sale Price -->
                        <div class="col-md-4 mb-3">
                            <label for="sale_price" class="form-label">Sale Price</label>
                            <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price"
                                value="{{ $product->sale_price }}" min="0">
                        </div>

                        <!-- Sale Start Date -->
                        <div class="col-md-4 mb-3">
                            <label for="sale_start_date" class="form-label">Sale Start Date</label>
                            <input type="date" class="form-control" id="sale_start_date" name="sale_start_date"
                                value="{{ $product->start_sale_date }}">
                        </div>

                        <!-- Sale End Date -->
                        <div class="col-md-4 mb-3">
                            <label for="sale_end_date" class="form-label">Sale End Date</label>
                            <input type="date" class="form-control" id="sale_end_date" name="sale_end_date"
                                value="{{ $product->sale_end_date }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Product Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Brand ID -->
                        <div class="col-md-6 mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select class="form-select" id="brand_id" name="brand_id">
                                <option value=" ">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tax ID -->
                        <div class="col-md-6 mb-3">
                            <label for="tax_id" class="form-label">Tax</label>
                            <select class="form-select" id="tax_id" name="tax_id">
                                <option value="">Select Tax</option>
                                @foreach ($taxes as $tax)
                                    <option value="{{ $tax->id }}"
                                        {{ $product->tax_id == $tax->id ? 'selected' : '' }}>{{ $tax->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Product Type -->
                        <div class="col-md-6 mb-3">
                            <label for="product_type" class="form-label">Product Type</label>
                            <select class="form-select" id="product_type" name="product_type" required>
                                <option value="PHYSICAL" {{ $product->product_type == 'PHYSICAL' ? 'selected' : '' }}>
                                    Physical</option>
                                <option value="DIGITAL" {{ $product->product_type == 'DIGITAL' ? 'selected' : '' }}>Digital
                                </option>
                            </select>
                        </div>

                        <!-- Barcode -->
                        <div class="col-md-6 mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text" class="form-control" id="barcode" name="barcode"
                                value="{{ $product->barcode }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dimensions & Weight -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Dimensions & Weight
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Length -->
                        <div class="col-md-3 mb-3">
                            <label for="length" class="form-label">Length</label>
                            <input type="number" step="0.01" class="form-control" id="length" name="length"
                                value="{{ $product->length }}" min="0">
                        </div>

                        <!-- Width -->
                        <div class="col-md-3 mb-3">
                            <label for="width" class="form-label">Width</label>
                            <input type="number" step="0.01" class="form-control" id="width" name="width"
                                value="{{ $product->width }}" min="0">
                        </div>

                        <!-- Height -->
                        <div class="col-md-3 mb-3">
                            <label for="height" class="form-label">Height</label>
                            <input type="number" step="0.01" class="form-control" id="height" name="height"
                                value="{{ $product->height }}" min="0">
                        </div>

                        <!-- Weight -->
                        <div class="col-md-3 mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                                value="{{ $product->weight }}" min="0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Media
                </div>
                <div class="card-body">
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" id="image" name="image"
                            value="{{ $product->image }}">
                    </div>

                    <!-- Images -->
                    <div class="mb-3">
                        <label for="images" class="form-label">Images</label>
                        <input type="text" class="form-control" id="images" name="images"
                            value="{{ $product->images }}">
                    </div>
                </div>
            </div>

            <!-- Advanced Settings -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Advanced Settings
                </div>
                <div class="card-body">
                    <!-- Is Published -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                            value="1" {{ $product->is_published ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Is Published</label>
                    </div>

                    <!-- Allow Checkout When Out of Stock -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="allow_checkout_when_out_of_stock"
                            name="allow_checkout_when_out_of_stock" value="1"
                            {{ $product->allow_checkout_when_out_of_stock ? 'checked' : '' }}>
                        <label class="form-check-label" for="allow_checkout_when_out_of_stock">Allow Checkout When Out of Stock</label>
                    </div>

                    <!-- Is Featured -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured"
                            value="1" {{ $product->is_featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Is Featured</label>
                    </div>

                    <!-- Generate License Code -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="generate_license_code"
                            name="generate_license_code" value="1"
                            {{ $product->generate_license_code ? 'checked' : '' }}>
                        <label class="form-check-label" for="generate_license_code">Generate License Code</label>
                    </div>

                    <!-- Minimum Order Quantity -->
                    <div class="mb-3">
                        <label for="minimum_order_quantity" class="form-label">Minimum Order Quantity</label>
                        <input type="number" class="form-control" id="minimum_order_quantity"
                            name="minimum_order_quantity" value="{{ $product->minimum_order_quantity }}" min="0">
                    </div>

                    <!-- Maximum Order Quantity -->
                    <div class="mb-3">
                        <label for="maximum_order_quantity" class="form-label">Maximum Order Quantity</label>
                        <input type="number" class="form-control" id="maximum_order_quantity"
                            name="maximum_order_quantity" value="{{ $product->maximum_order_quantity }}" min="0">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
@endsection
