<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Log In | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- title-->
                <h4 class="mt-0">Sign In</h4>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                <!-- form -->
                <form action="#">
                    <div class="form-group">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" type="email" id="emailaddress" required=""
                               placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <a href="pages-recoverpw-2.html" class="text-muted float-right"><small>Forgot your
                                password?</small></a>
                        <label for="password">Password</label>
                        <input class="form-control" type="password" required="" id="password"
                               placeholder="Enter your password">
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Log In
                        </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Log in with</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="{{ route('auth.redirect', 'github') }}" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-github-circle"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('auth.redirect', 'gitlab') }}" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-gitlab"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="pages-register-2.html"
                                                                    class="text-muted ml-1"><b>Sign Up</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">I love the color!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i
                        class="mdi mdi-format-quote-close"></i>
            </p>
            <p>
                - Hyper Admin User
            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- bundle -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

</body>
</html>