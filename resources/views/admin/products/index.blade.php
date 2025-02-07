@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Products</li>    
</ol>

<div class="card mb-4">
    <div class="card-header ">
        <i class="fas fa-table me-1"></i>
        ALL PRODUCTS
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Product Type</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Product Type</th>
                </tr>
            </tfoot>
           <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->cost }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->product_type }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No products found</td>
                </tr>
                @endforelse


           </tbody>
        </table>
    </div>
</div>
@endsection