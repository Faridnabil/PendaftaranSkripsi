<!DOCTYPE html>
<html lang="en">

<head>
    <!--SPICA ADMIN-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('tittle')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('Spica/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Spica/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('Spica/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('Spica/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item sidebar-category">
                    <p>Navigation</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item sidebar-category">
                    <p>Data Master</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Mahasiswa</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic1">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pengajuan">Pengajuan
                                    Proposal</a></li>
                            <li class="nav-item"> <a class="nav-link" href="nota-sidang">Nota Sidang</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="daftar-sidang">Daftar Sidang</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="nilai">Hasil Nilai</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Dosen</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic2">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="dataPengajuan">Data Pendaftar
                                    Proposal</a></li>
                            <li class="nav-item"> <a class="nav-link" href="notaSidang">Nota Sidang</a></li>
                            <li class="nav-item"> <a class="nav-link" href="daftarSidang">Data Pendaftar
                                    Sidang</a></li>
                            <li class="nav-item"> <a class="nav-link" href="nilai">Nilai</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item sidebar-category">
                    <p>Sidang</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="sidang" aria-expanded="false"
                        aria-controls="auth">
                        <i class="mdi mdi-book menu-icon"></i>
                        <span class="menu-title">Sidang</span>
                    </a>
                </li>
                <li class="nav-item sidebar-category">
                    <p>Apps</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Help</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="navbar-brand-wrapper">
                        <a class="navbar-brand brand-logo" href="dashboard"><img
                                src="{{ asset('Spica/images/logo.png') }}" alt="logo" /></a>
                    </div>
                    <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, {{ auth()->user()->name }}
                    </h4>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item">
                            <h4 class="mb-0 font-weight-bold d-none d-xl-block">
                                {{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h4>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                        <li class="nav-item nav-search d-none d-lg-block">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Here..."
                                    aria-label="search" aria-describedby="search">
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                <img src="{{ auth()->user()->foto }}" alt="profile"/>
                                <span class="nav-profile-name">{{ auth()->user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="mdi mdi-settings text-primary" href="editProfile"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item">
                                    <i class="mdi mdi-logout text-primary" href="logout"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link icon-link">
                                <i class="mdi mdi-plus-circle-outline"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link icon-link">
                                <i class="mdi mdi-web"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link icon-link">
                                <i class="mdi mdi-clock-outline"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    @yield('konten')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                @yield('footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('Spica/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('Spica/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('Spica/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('Spica/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Spica/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Spica/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('Spica/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('Spica/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('Spica/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('Spica/js/file-upload.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
