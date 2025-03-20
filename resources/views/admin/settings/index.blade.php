@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </nav>
   
    <div class="container">
        <h4 class="mb-3">Common</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-tools fs-3 text-primary me-3"></i>
                        <div>
                            <a href="{{route('admin.settings.general')}}" class="fw-bold text-decoration-none">General</a>
                            <p class="small text-muted mb-0">Update general settings & license.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-envelope-open-text fs-3 text-primary me-3"></i>
                        <div>
                            <a href="{{route('admin.settings.email')}}" class="fw-bold text-decoration-none">Email</a>
                            <p class="small text-muted mb-0">Manage email settings & templates.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-photo-video fs-3 text-primary me-3"></i>
                        <div>
                            <a href="#" class="fw-bold text-decoration-none">Media</a>
                            <p class="small text-muted mb-0">Manage and upload media files.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-palette fs-3 text-primary me-3"></i>
                        <div>
                            <a href="{{route('admin.settings.appearance')}}" class="fw-bold text-decoration-none">Appearance</a>
                            <p class="small text-muted mb-0">Customize site themes & layout.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-link fs-3 text-primary me-3"></i>
                        <div>
                            <a href="#" class="fw-bold text-decoration-none">Permalink</a>
                            <p class="small text-muted mb-0">Configure URL structures.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <h4 class="mt-4 mb-3">Localization</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-language fs-3 text-primary me-3"></i>
                        <div>
                            <a href="#" class="fw-bold text-decoration-none">Languages</a>
                            <p class="small text-muted mb-0">Manage site languages & translations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-globe fs-3 text-primary me-3"></i>
                        <div>
                            <a href="#" class="fw-bold text-decoration-none">Locales</a>
                            <p class="small text-muted mb-0">Download & import localization files.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <h4 class="mt-4 mb-3">Ecommerce</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-store fs-3 text-primary me-3"></i>
                        <div>
                            <a href="{{route('admin.settings.store')}}" class="fw-bold text-decoration-none">Store Settings</a>
                            <p class="small text-muted mb-0">Update store information & policies.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-money-bill-wave fs-3 text-primary me-3"></i>
                        <div>
                            <a href="{{route('admin.settings.payment')}}" class="fw-bold text-decoration-none">Payments</a>
                            <p class="small text-muted mb-0">Manage payment gateways & methods.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-shipping-fast fs-3 text-primary me-3"></i>
                        <div>
                            <a href="{{route('admin.settings.shipping')}}" class="fw-bold text-decoration-none">Shipping</a>
                            <p class="small text-muted mb-0">Update shipping zones & rates.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-user-shield fs-3 text-primary me-3"></i>
                        <div>
                            <a href="#" class="fw-bold text-decoration-none">Security</a>
                            <p class="small text-muted mb-0">Manage roles, permissions & access.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
