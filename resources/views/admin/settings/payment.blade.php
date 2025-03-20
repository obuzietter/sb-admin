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
        <div class="card-header fw-bold">Payment Settings</div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="paymentGateway" class="form-label">Payment Gateway</label>
                    <select class="form-select" id="paymentGateway">
                        <option selected>Choose Payment Gateway</option>
                        <option value="paypal">PayPal</option>
                        <option value="stripe">Stripe</option>
                        <option value="mpesa">M-Pesa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="merchantId" class="form-label">Merchant ID</label>
                    <input type="text" class="form-control" id="merchantId" placeholder="Enter Merchant ID">
                </div>
                <div class="mb-3">
                    <label for="publicKey" class="form-label">Public Key</label>
                    <input type="text" class="form-control" id="publicKey" placeholder="Enter Public Key">
                </div>
                <div class="mb-3">
                    <label for="secretKey" class="form-label">Secret Key</label>
                    <input type="password" class="form-control" id="secretKey" placeholder="Enter Secret Key">
                </div>
                <div class="mb-3">
                    <label for="currency" class="form-label">Default Currency</label>
                    <select class="form-select" id="currency">
                        <option selected>Choose Currency</option>
                        <option value="USD">USD - US Dollar</option>
                        <option value="KES">KES - Kenyan Shilling</option>
                        <option value="EUR">EUR - Euro</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

@endsection
