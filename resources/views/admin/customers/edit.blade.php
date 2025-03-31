@extends('layouts.admin')

@section('title', 'Create Customer')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.customers') }}">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
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
    <div class="card mb-4 p-2">

        <div class="card-body">

            <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $customer->first_name }}">
                    </div>
                    <div class="col mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $customer->last_name }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}"
                            required>
                    </div>
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}"
                            required>
                    </div>
                </div>
                {{-- password field with label and a generate password icon --}}
                <div class="row">
                    <div class="col mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <button class="btn btn-outline-warning" type="button" id="view-password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-success" type="button" id="copy-password">
                                <i class="fa-solid fa-clipboard"></i>
                            </button>
                            <button class="btn btn-outline-primary" type="button" id="generate-password">
                                <i class="fa-solid fa-key"></i>
                            </button>
                            
                           
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>
        </div>
    </div>

    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('view-password').addEventListener('click', function () {
            let password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        });
        document.getElementById('generate-password').addEventListener('click', function () {
            let password = Math.random().toString(36).slice(-8);
            console.log(password);
            
            document.getElementById('password').value = password;
        });
        document.getElementById('copy-password').addEventListener('click', function () {
            let password = document.getElementById('password');
            password.select();
            document.execCommand('copy');
            Swal.fire({
                icon: 'success',
                title: 'Password Copied',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>


@endsection
