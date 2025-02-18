@extends('layouts.admin')

@section('title', 'Edit Brand')

@section('content')
    <div class="container mt-5">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.brands') }}">Brands</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
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


        <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Brand Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
            </div>

            <!-- Brand Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Brand Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $brand->description }}</textarea>
            </div>

            <!-- Brand Image -->

            <div class="row">

                <div class="col mb-3">
                    <label for="image" class="form-label">Brand Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                {{-- image preview --}}
                <div class="col mb-3">
                    <img src="{{ asset('storage/' . $brand->image) }}" class="img-thumbnail" alt="Brand Image" width="200">
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
        </form>
    </div>
@endsection
