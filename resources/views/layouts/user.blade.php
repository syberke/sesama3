<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Bansos', 'Sistem Bansos Pendidikan') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --purple-1: #845EC2;
            --blue-1: #2C73D2;
            --blue-2: #0081CF;
            --blue-3: #0089BA;
            --teal-1: #008E9B;
            --teal-2: #008F7A;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
        }

        /* Sidebar desktop & mobile */
        .sidebar,
        .sidebar-mobile {
            min-height: 100vh;
            background: linear-gradient(180deg,
                    var(--purple-1),
                    var(--blue-1),
                    var(--blue-2),
                    var(--blue-3),
                    var(--teal-1),
                    var(--teal-2));
        }

        /* Make sidebar a column so inner elements can be pushed to bottom */
        .sidebar {
            display: flex;
            flex-direction: column;
        }

        .sidebar .sidebar-inner {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Make sidebar fixed on medium and larger screens and shift main content */
        @media (min-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 250px;
                height: 100vh;
                overflow-y: auto;
                padding-top: 20px;
                padding-bottom: 20px;
                z-index: 1020;
            }

            .sidebar-mobile {
                display: none !important;
            }

            main.col-md-9.ms-sm-auto.col-lg-10.px-md-4 {
                margin-left: 250px;
            }
        }

        .sidebar .nav-link,
        .sidebar-mobile .nav-link {
            color: rgba(255, 255, 255, 0.95);
            padding: 10px 16px;
            margin: 6px 0;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active,
        .sidebar-mobile .nav-link:hover,
        .sidebar-mobile .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateX(6px);
        }

        /* Navbar mobile gradasi + animasi */
        .bg-primary {
            background: linear-gradient(270deg,
                    var(--purple-1),
                    var(--blue-1),
                    var(--blue-2),
                    var(--teal-1)) !important;
            background-size: 400% 400%;
            animation: navbarGradient 12s ease infinite;
        }

        @keyframes navbarGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Button gradasi */
        .btn-primary {
            background: linear-gradient(90deg, var(--purple-1), var(--blue-1), var(--teal-1));
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: bold;
            color: white;
            background-size: 300% 300%;
            animation: btnGradient 8s ease infinite;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        @keyframes btnGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Tabel */
        .table th {
            background: var(--blue-1);
            color: white;
        }

        /* Logo Pertamina */
        .logo-pertamina {
            height: 70px;
            margin-bottom: 15px;
        }

        /* Sidebar header */
        .sidebar-header h4 {
            font-weight: bold;
            color: white;
            font-size: 30px;
        }

        .sidebar-header h6 {
            font-weight: italic;
            color: rgb(250, 250, 250);
            font-size: 12px;
        }

        /* Alerts */
        .alert-success {
            border-left: 5px solid var(--teal-2);
        }

        .alert-danger {
            border-left: 5px solid var(--purple-1);
        }
    </style>

</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar desktop -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar collapse">
                @include('partials.usersidebar')
            </nav>

            <!-- Sidebar mobile (Offcanvas) -->
            <div class="d-md-none p-2 bg-primary text-white d-flex justify-content-between align-items-center">
                <button class="btn btn-light btn-sm" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <span>{{ config('Bansos', 'Berbagi Asa') }}</span>
            </div>
            <div class="offcanvas offcanvas-start sidebar-mobile text-white" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header">
                    <h5>Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body p-0">
                    @include('partials.usersidebar')
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title', 'Dashboard')</h1>
                    <div class="text-muted">
                        <i class="fas fa-user me-1"></i>
                        {{ Auth::user()->name ?? 'Admin' }}
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('scripts')
</body>

</html>
