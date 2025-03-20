@extends('layouts.admin')

@section('title', 'Email')

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
        <div class="card-header fw-bold">Store Settings</div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="storeName" class="form-label">Store Name</label>
                    <input type="text" class="form-control" id="storeName" placeholder="Enter store name">
                </div>
                <div class="mb-3">
                    <label for="storeCurrency" class="form-label">Default Currency</label>
                    <select class="form-select" id="storeCurrency">
                        <option selected>Choose currency</option>
                        <option value="USD">USD - US Dollar</option>
                        <option value="KES">KES - Kenyan Shilling</option>
                        <option value="EUR">EUR - Euro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="storeEmail" class="form-label">Store Email</label>
                    <input type="email" class="form-control" id="storeEmail" placeholder="Enter store email">
                </div>
                <div class="mb-3">
                    <label for="storePhone" class="form-label">Store Phone</label>
                    <input type="text" class="form-control" id="storePhone" placeholder="Enter store phone number">
                </div>
                <div class="mb-3">
                    <label for="storeAddress" class="form-label">Store Address</label>
                    <textarea class="form-control" id="storeAddress" rows="3" placeholder="Enter store address"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection