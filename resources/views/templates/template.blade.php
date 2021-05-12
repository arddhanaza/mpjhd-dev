<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
          type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/assets/css/custom.css')}}" type="text/css">
    {{--Data Tables--}}
    <link rel="stylesheet" href="{{asset('/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{asset('/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{asset('/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}"
          type="text/css">
    @yield('css')
</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <h2 class="text-primary">M P J H D </h2>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    @if(false)
                        <li class="nav-item">
                            <a class="nav-link disabled  {{ Route::is('landing_page') ? 'active' : '' }}"
                               href="{{route('landing_page')}}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('data_pelanggaran') ? 'active' : '' }}"
                           href="{{route('data_pelanggaran')}}">
                            <i class="ni ni-bullet-list-67 text-primary"></i>
                            <span class="nav-link-text">Data Pelanggaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('data_pegawai') ? 'active' : '' }}"
                           href="{{route('data_pegawai')}}">
                            <i class="ni ni-paper-diploma text-primary"></i>
                            <span class="nav-link-text">Data Pegawai</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                             data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <!-- Sidenav toggler -->
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="icon icon-shape text-white rounded-circle shadow">
                                    <i class="ni ni-circle-08"></i>
                                </div>
                                <div class="media-body d-none d-lg-block">
                                    <span class="mb-0 text-sm mr-3  font-weight-bold">{{session(0)->nama}}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            @if(session(0)->status == 'Pemeriksa')
                                <a href="{{route('edit_profile',session(0)->id_pemeriksa)}}" class="dropdown-item">
                                    <i class="ni ni-atom"></i>
                                    <span>Edit Profile</span>
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="{{route('logout')}}" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{--HEADER AND BODY--}}
    @yield('header')
    @yield('content')

    <div class="container-fluid mt-3">
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2021 <a class="font-weight-bold ml-1" target="_blank">Kementrian Pertahanan RI</a> |
                        <a href="https://arddhanaaa.com" class="font-weight-bold ml-1" target="_blank">@arddhanaaa</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
{{--Data Tables--}}
<script src="{{asset('/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('/assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>

