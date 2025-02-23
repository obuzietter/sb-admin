<nav class="sb-topnav navbar navbar-expand-lg navbar-dark bg-dark shadow-sm px-3">
    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3 fw-bold text-uppercase" href="{{ route('admin.dashboard') }}">Admin Panel</a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-outline-light btn-sm order-1 order-lg-0 me-3 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    {{-- <form class="d-none d-md-flex ms-auto me-3">
        <div class="input-group">
            <input class="form-control border-0 rounded-start" type="text" placeholder="Search..." aria-label="Search">
            <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form> --}}

    <!-- Navbar Right Section -->
    <ul class="navbar-nav ms-auto">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user fa-fw me-1"></i> Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 px-3">
                <li><a class="dropdown-item" href="#!"><i class="fas fa-cog me-2"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#!"><i class="fas fa-history me-2"></i> Activity Log</a></li>
                <li><hr class="dropdown-divider"></li>
                <li class="text-center">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-2"></i>Log Out</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
