<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi User</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('Spica/images/logo-dark.svg') }}" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" method="POST" action="register_redirect" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <table>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Warning!</strong>
                                                <span> {{ $message }} </span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Warning!</strong>
                                                <span> {{ $message }} </span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Warning!</strong>
                                                <span> {{ $message }} </span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="custom-select" id="level" name="level" value="{{old('level')}}">
                                            <option selected disabled>Select one</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="dosen">Dosen</option>
                                        </select>
                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Warning!</strong>
                                                <span> {{ $message }} </span>
                                            </div>
                                        @enderror
                                    </div>
                                        <button type="submit" class="btn btn-primary" name="submit"
                                            value="Submit">Submit</button>
                                        <div class="text-center mt-4 font-weight-light">
                                            Already have an account? <a href="login" class="text-primary">Login</a>
                                        </div>
                                    </table>
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
