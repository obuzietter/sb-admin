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
            <div class="card-header fw-bold">General Settings</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="siteName" class="form-label">Site Name</label>
                        <input type="text" class="form-control" id="siteName" placeholder="Enter site name">
                    </div>
                    <div class="mb-3">
                        <label for="siteURL" class="form-label">Site URL</label>
                        <input type="url" class="form-control" id="siteURL" placeholder="Enter site URL">
                    </div>
                    <div class="mb-3">
                        <label for="adminEmail" class="form-label">Admin Email</label>
                        <input type="email" class="form-control" id="adminEmail" placeholder="Enter admin email">
                    </div>
                    <div class="mb-3">
                        <label for="timezone" class="form-label">Timezone</label>
                        <select class="form-select" id="timezone">
                            <option selected>Choose a timezone</option>
                            <option value="UTC">UTC</option>
                            <option value="Africa/Nairobi">Africa/Nairobi</option>
                            <option value="America/New_York">America/New York</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">Default Language</label>
                        <select class="form-select" id="language">
                            <option selected>Choose a language</option>
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="sw">Swahili</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    

    
    

@endsection
