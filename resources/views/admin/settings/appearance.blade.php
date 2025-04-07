@extends('layouts.admin')

@section('title', 'Appearance')

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

    {{-- this page contains appearaance settings for the admin panel --}}
    <div class="container mt-4">
        <div class="card">
            <div class="card-header fw-bold">Admin Appearance Settings</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="logoUpload" class="form-label">Upload Logo</label>
                        <input type="file" class="form-control" id="logoUpload">
                    </div>
                    <div class="mb-3">
                        <label for="faviconUpload" class="form-label">Upload Favicon</label>
                        <input type="file" class="form-control" id="faviconUpload">
                    </div>
                    <div class="mb-3">
                        <label for="primaryColor" class="form-label">Primary Color</label>
                        <input type="color" class="form-control" id="primaryColor" value="#007bff">
                    </div>
                    <div class="mb-3">
                        <label for="secondaryColor" class="form-label">Secondary Color</label>
                        <input type="color" class="form-control" id="secondaryColor" value="#6c757d">
                    </div>
                    <div class="mb-3">
                        <label for="layout" class="form-label">Layout Style</label>
                        <select class="form-select" id="layout">
                            <option selected>Choose layout</option>
                            <option value="boxed">Boxed</option>
                            <option value="full-width">Full Width</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
