@props(['openingChapters', 'courseTitle' => 'Course Title', 'currentChapterId' => ''])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- General CSS Files -->
    <link href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('modules/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('modules/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- Template CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- Navbar -->
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3">
                    <li><a class="nav-link nav-link-lg" data-toggle="sidebar" href="#"><i class="fas fa-bars"></i></a></li>
                    <li><a class="nav-link nav-link-lg d-sm-none" data-toggle="search" href="#"><i class="fas fa-search"></i></a></li>
                </ul>
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="dropdown"><a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                            <img class="rounded-circle mr-1" src="{{ asset('img/avatar/avatar-1.png') }}" alt="image">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item has-icon" href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                            <a class="dropdown-item has-icon" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user"></i> Profile
                            </a>
                            <a class="dropdown-item has-icon" href="#">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item has-icon text-danger" style="cursor: pointer;" :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logouts
                                </a>
                            </form>
                            {{-- <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a> --}}
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Sidebar -->
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="row align-items-center my-4">
                        <div class="col-2">
                            <a class="btn btn-icon" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left mr-4"></i></a>
                        </div>
                        <div class="col">
                            <p class="course-title">{{ $courseTitle }}</p>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Pembuka</li>
                        @foreach ($openingChapters as $ch)
                            <li class="dropdown {{ $ch->id == $currentChapterId ? 'active' : '' }}">
                                <a href="{{ route('chapter.student.show', ['chapter' => $ch->id]) }}" class="nav-link">
                                    <i class="fas fa-book"></i><span>{{ $ch->title }}</span>
                                </a>
                            </li>
                        @endforeach
                        <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Master Data</li>
                        <li class="dropdown {{ request()->routeIs('course.setup') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('course.setup') }}"><i class="fas fa-th-large"></i><span>Modules</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    {{-- <div class="section-header">
                        @yield('header')
                    </div> --}}
                    <div class="section-body">
                        {{-- @yield('content') --}}
                        {{ $slot }}
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2025 <div class="bullet"></div> Iis Masriah
                    {{-- <a href="https://stisla.com/">Stisla</a> --}}
                </div>
                <div class="footer-right">
                    1.0
                </div>
            </footer>
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('modules/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('modules/chart.min.js') }}"></script>
    <script src="{{ asset('modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script src="{{ asset('modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/index.js') }}"></script> --}}
    @yield('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
