@extends('layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h1>{{ $products }}</h1>
                    <h5>Products</h5>
                </div>


            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h1>{{ $brands }}</h1>
                    <h5>Brands</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h1>{{ $categories }}</h1>
                    <h5>Categories</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h1>{{ $admins }}</h1>
                    <h5>Admins</h5>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
