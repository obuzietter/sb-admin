@extends('layouts.admin')

@section('title', 'General')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
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

<div class="container mt-4">
    <div class="card">
        <div class="card-header fw-bold">Shipping Settings</div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="shippingMethod" class="form-label">Shipping Method</label>
                    <select class="form-select" id="shippingMethod">
                        <option selected>Choose Shipping Method</option>
                        <option value="standard">Standard Shipping</option>
                        <option value="express">Express Shipping</option>
                        <option value="pickup">Store Pickup</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="shippingRate" class="form-label">Shipping Rate</label>
                    <input type="text" class="form-control" id="shippingRate" placeholder="Enter Shipping Rate">
                </div>
                <div class="mb-3">
                    <label for="freeShippingThreshold" class="form-label">Free Shipping Threshold</label>
                    <input type="text" class="form-control" id="freeShippingThreshold" placeholder="Enter amount for free shipping">
                </div>
                <div class="mb-3">
                    <label for="shippingRegions" class="form-label">Shipping Regions</label>
                    <textarea class="form-control" id="shippingRegions" rows="3" placeholder="Enter supported regions"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

@endsection