@extends('shop.layouts.shop')

@section('title', 'Profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Profile</h1>
                <p>Here you can see your profile information.</p>
                <p>Username: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

@endsection