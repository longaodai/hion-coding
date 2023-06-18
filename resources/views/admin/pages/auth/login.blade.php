<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OHION - Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="icon" type="image/png" href="{{ asset('common/images/logo.png') }}" />

    <!-- App css -->
    <link href="{{ asset('admin_libs_asset\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_libs_asset\css\icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_libs_asset\css\app.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <a href="index.html">
                                    <span><img src="{{ asset('common/images/logo.png') }}" alt="" height="100"></span>
                                </a>
                            </div>
                            @include('admin.notifications.toast')
                            <form action="{{ route('admin.login-auth') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress" value="{{ old('email') }}"
                                        placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}"
                                        placeholder="Enter your password">
                                </div>

                                {{-- <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div> --}}

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-danger btn-block" type="submit"> Log In </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="pages-register.html"
                                    class="text-muted ml-1"><b class="font-weight-semibold">Sign Up</b></a></p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <footer class="footer footer-alt">
        {{ date('Y') }} &copy; {{ __('common.lbl_name_author') }} 
    </footer>
    <!-- end Footer -->

    <!-- Vendor js -->
    <script src="{{ asset('admin_libs_asset\js\vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin_libs_asset\js\app.min.js') }}"></script>

</body>

</html>
