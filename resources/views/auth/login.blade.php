<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Log In | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="authentication-bg" data-layout-config='{"darkMode":false}'>

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                        </div>

                        <form action="#">

                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" required=""
                                       placeholder="Enter your email">
                            </div>

                            <div class="form-group">
                                <a href="pages-recoverpw.html" class="text-muted float-right"><small>Forgot your
                                        password?</small></a>
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control"
                                           placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye" id="btn-password" data-hidden="1"
                                                  onclick="showPassword()">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Log In</button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="pages-register.html"
                                                                        class="text-muted ml-1"><b>Sign Up</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2022
    @if(date('Y') != 2022)
        - {{ date('Y') }}
    @endif
    © {{ config('app.name') }}
</footer>

<!-- bundle -->
{{--<script src="{{ asset('js/vendor.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/app.min.js') }}"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function showPassword() {
        if ($("#btn-password").data('hidden') == 1) {
            $("#password").attr('type', 'text');
            $("#btn-password").data('hidden', 0);
        } else {
            $("#password").attr('type', 'password');
            $("#btn-password").data('hidden', 1);
        }
    }
</script>

</body>
</html>
