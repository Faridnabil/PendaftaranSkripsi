<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login E-Skripsi</title>
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
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('Spica/images/logo-dark.png') }}" alt="logo">
                            </div>
                            <h4>Hello! Selamat Datang Kembali</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="POST" action="login_redirect">
                                @csrf
                                @if (session()->has('loginError'))
                                    {{ session('loginError') }}
                                @endif
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail"
                                        name="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        {{ $message }} <br>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <input type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                </div>
                                <div class="text-center mt-4 font-weight-light">Don't have an account? <a
                                        href="register" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('Spica/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <script src="{{ asset('Spica/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- inject:js -->
    <script src="{{ asset('Spica/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Spica/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Spica/js/template.js') }}"></script>
    <!-- endinject -->
</body>

</html>
