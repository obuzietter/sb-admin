@extends('shop.layouts.shop')

@section('title', 'Profile')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Profile</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Profile</li>
        </ol>
    </div>
    <!-- Single Page Header End -->



    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card border-0" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                    <div class="card-body text-center">
                        <img src="https://img.freepik.com/free-vector/user-blue-gradient_78370-4692.jpg?uid=R97350360&ga=GA1.1.569336961.1721632028&semt=ais_hybrid"
                            class="rounded-circle img-fluid" alt="User Image" width="75" height="75"
                            style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;">
                        <h5 class="mt-3">{{ $user->first_name }}</h5>

                        <!-- Button trigger profile modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#profileModal">
                            Update Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="card border-0" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="card-header bg-primary text-white">
                        Account Details
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $user->first_name . ' ' . $user->last_name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    </div>
                </div>

                <!-- Orders & Wishlist -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card border-0" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="card-header bg-success text-white">
                                Recent Orders
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Order #12345 - <span class="text-success">Delivered</span></li>
                                <li class="list-group-item">Order #12344 - <span class="text-warning">Pending</span></li>
                                <li class="list-group-item">Order #12343 - <span class="text-danger">Cancelled</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="card-header bg-info text-white">
                                Wishlist
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Product 1 <span class="badge bg-secondary">Electronics</span>
                                </li>
                                <li class="list-group-item">Product 2 <span class="badge bg-secondary">Clothing</span></li>
                                <li class="list-group-item">Product 3 <span class="badge bg-secondary">Home & Kitchen</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Account Settings -->
                <div class="card mt-3 border-0" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="card-header bg-dark text-white">
                        Account Settings
                    </div>
                    <div class="card-body">
                        
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#changePasswordModal">
                            Change Password
                        </button>
                        
                        {{-- logout form --}}
                        <form action="{{ route('user.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Logout</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Information</h5>
                    <button type="button" class="btn close bg-danger text-white fw-bold" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profileForm" action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                value="{{ $user->first_name }}" placeholder="Enter First Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name"
                                value="{{ $user->last_name }}" placeholder="Enter Last Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}" placeholder="Enter Phone Number" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="profileForm" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Change password modal --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="btn close bg-danger text-white fw-bold" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" action="{{ route('user.password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="old_password"
                                placeholder="Enter Current Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="password"
                                placeholder="Enter New Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation"
                                placeholder="Confirm New Password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="changePasswordForm" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>



    @endsection
