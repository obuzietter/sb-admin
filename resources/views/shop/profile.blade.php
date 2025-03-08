@extends('shop.layouts.shop')

@section('title', 'Profile')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle img-fluid" alt="User Image">
                    <h5 class="mt-3">John Doe</h5>
                    <p class="text-muted">johndoe@example.com</p>
                    <button class="btn btn-primary btn-sm">Edit Profile</button>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Account Details
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> johndoe@example.com</p>
                    <p><strong>Phone:</strong> +123 456 7890</p>
                    <p><strong>Address:</strong> 123 Main St, City, Country</p>
                </div>
            </div>

            <!-- Orders & Wishlist -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
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
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            Wishlist
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Product 1 <span class="badge bg-secondary">Electronics</span></li>
                            <li class="list-group-item">Product 2 <span class="badge bg-secondary">Clothing</span></li>
                            <li class="list-group-item">Product 3 <span class="badge bg-secondary">Home & Kitchen</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Account Settings
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-danger">Change Password</button>
                    <button class="btn btn-outline-warning">Manage Payment Methods</button>
                    <button class="btn btn-outline-secondary">Logout</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
