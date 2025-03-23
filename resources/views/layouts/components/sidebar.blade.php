<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading fw-bold text-white">Core</div>
            <a class="nav-link {{ Request::segment(2) == 'dashboard' ? 'bg-primary text-white' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading fw-bold text-white">Ecommerce</div>

            {{-- products drop down --}}
            <a class="nav-link collapsed {{ Request::segment(2) == 'products' ? 'bg-primary text-white' : '' }}"
                href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-bag-shopping"></i></div>
                Products
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::segment(2) == 'products' ? 'show' : '' }}" id="collapseProducts"
                aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.products') }}">All Products</a>
                    <a class="nav-link" href="{{ route('admin.products.create') }}">Create Product</a>
                </nav>
            </div>

            {{-- brands drop down --}}
            <a class="nav-link collapsed {{ Request::segment(2) == 'brands' ? 'bg-primary text-white' : '' }}"
                href="#" data-bs-toggle="collapse" data-bs-target="#collapseBrands" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                Brands
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::segment(2) == 'brands' ? 'show' : '' }}" id="collapseBrands"
                aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.brands') }}">All Brands</a>
                    <a class="nav-link" href="{{ route('admin.brands.create') }}">Create Brand</a>
                </nav>
            </div>

            {{-- categories drop down --}}
            <a class="nav-link collapsed {{ Request::segment(2) == 'categories' ? 'bg-primary text-white' : '' }}"
                href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                Categories
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::segment(2) == 'categories' ? 'show' : '' }}" id="collapseCategories"
                aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.categories') }}">All Categories</a>
                    <a class="nav-link" href="{{ route('admin.categories.create') }}">Create Category</a>
                </nav>
            </div>
            {{-- Customers --}}
            <a class="nav-link collapsed {{ Request::segment(2) == 'customers' ? 'bg-primary text-white' : '' }}"
                href="{{route('admin.customers')}}" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                Customers
                {{-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> --}}
            </a>
            <div class="sb-sidenav-menu-heading fw-bold text-white">Configurations</div>
            {{-- Settings drop down --}}
            <a class="nav-link collapsed {{ Request::segment(2) == 'settings' ? 'bg-primary text-white' : '' }}"
                href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon text-white"><i class="fas fa-cog"></i></div>
                Settings
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::segment(2) == 'settings' ? 'show' : '' }}" id="collapseSettings"
                aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.settings') }}">General</a>
                    <a class="nav-link" href="{{ route('admin.categories.create') }}">Store</a>
                </nav>
            </div>

        </div>
    </div>
    <div class="sb-sidenav-footer bg-light">
        <div class="small text-dark">Logged in as:</div>
        <div class="small text-primary fw-bold">
            {{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}
        </div>

    </div>
</nav>
