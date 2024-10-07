<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom Admin Styles -->
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet"/>

    <!-- FontAwesome Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Custom styles for additional features -->
    <link href="{{ asset('/styles/admin_styles.css') }}" rel="stylesheet"/>

    <!-- jQuery and Bootstrap JavaScript for interactivity -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="sb-nav-fixed">
<!-- Top Navigation Bar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand ps-3" href="#">ADMIN PANEL</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Search Bar -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"/>
            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- User Dropdown -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf <!-- CSRF protection -->
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>

        </li>
    </ul>
</nav>

<!-- Sidebar and Main Content -->
<div id="layoutSidenav">
    <!-- Sidebar -->
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link active" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Management</div>

                    @if(Auth::user()->role === 'security_admin')
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                        Pass-outs
                    </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            Stolen Devices
                        </a>
                    @endif
                    @if(Auth::user()->role === 'general_admin')
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                            News
                        </a>

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Students
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Lectures
                        </a>

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Events
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-flask"></i></div>
                            Labs
                        </a>
                    @endif


                </div>
            </div>
        </nav>
    </div>

    <!-- Main Content Area -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <!-- Page Content -->
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">&copy; University of Limpopo 2024</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Custom Scripts -->
<script src="{{ asset('admin/js/scripts.js') }}"></script>

<!-- Optional: JavaScript for sidebar toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function (event) {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
            });
        }
    });
</script>
</body>
</html>
