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
            <div class="card-header fw-bold">Email Settings</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="smtpHost" class="form-label">SMTP Host</label>
                        <input type="text" class="form-control" id="smtpHost" placeholder="Enter SMTP host">
                    </div>
                    <div class="mb-3">
                        <label for="smtpPort" class="form-label">SMTP Port</label>
                        <input type="number" class="form-control" id="smtpPort" placeholder="Enter SMTP port">
                    </div>
                    <div class="mb-3">
                        <label for="smtpUsername" class="form-label">SMTP Username</label>
                        <input type="text" class="form-control" id="smtpUsername" placeholder="Enter SMTP username">
                    </div>
                    <div class="mb-3">
                        <label for="smtpPassword" class="form-label">SMTP Password</label>
                        <input type="password" class="form-control" id="smtpPassword" placeholder="Enter SMTP password">
                    </div>
                    <div class="mb-3">
                        <label for="emailEncryption" class="form-label">Encryption</label>
                        <select class="form-select" id="emailEncryption">
                            <option selected>Choose encryption type</option>
                            <option value="tls">TLS</option>
                            <option value="ssl">SSL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fromEmail" class="form-label">From Email</label>
                        <input type="email" class="form-control" id="fromEmail" placeholder="Enter from email address">
                    </div>
                    <div class="mb-3">
                        <label for="fromName" class="form-label">From Name</label>
                        <input type="text" class="form-control" id="fromName" placeholder="Enter sender name">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
