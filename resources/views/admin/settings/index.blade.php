@extends('layouts.admin')

@section('title', 'Products')

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

    <div class="card shadow-lg border-0 rounded-3" style="max-width: 400px; margin: auto;">
        <h5 class="card-header bg-success text-white text-center">Change Logo</h5>
        <div class="card-body text-center">
            <h5 class="card-title">Update Your Company Logo</h5>
    
            <div class="image border rounded-circle p-2 mx-auto" style="width: 120px; height: 120px;">
                <img src="{{asset('/storage/'.$company->logo)}}" 
                    alt="Company Logo" class="img-fluid rounded-circle" style="width: 100%; height: 100%;">
            </div>
    
            <form action="{{route('admin.settings.update-logo')}}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="logo" class="form-label fw-bold">Choose Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Upload Logo</button>
            </form>
        </div>
    </div>
    

@endsection
