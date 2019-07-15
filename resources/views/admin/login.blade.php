<!DOCTYPE html>
<!--
Template Name: Mintos - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Mintos - SHARED ON THEMELOCK.COM  I Login</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Toggles CSS -->
    <link href="/themes/mintos/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="/themes/mintos/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/themes/mintos/dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="loader-pendulums"></div>
</div>
<!-- /Preloader -->

<!-- HK Wrapper -->
<div class="hk-wrapper">

    <!-- Main Content -->
    <div class="hk-pg-wrapper hk-auth-wrapper">
        <header class="d-flex justify-content-end align-items-center">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-outline-secondary">Help</a>
                <a href="#" class="btn btn-outline-secondary">About Us</a>
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 pa-0">
                    <div class="auth-form-wrap pt-xl-0 pt-70">
                        <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                            <a class="auth-brand text-center d-block mb-20" href="#">
                                <img class="brand-img" src="/themes/mintos/dist/img/logo-light.png" alt="brand"/>
                            </a>
                            <form action="{{ route('admin.authenticate') }}" method="post">
                                @csrf
                                <h1 class="display-4 text-center mb-10">Welcome Back :)</h1>
                                <p class="text-center mb-30">Sign in to your account and enjoy unlimited perks.</p>
                                <div class="form-group">
                                    <input class="form-control" name="email" required placeholder="Email" type="email">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" name="password" required placeholder="Пароль" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox mb-25">
                                    <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                    <label class="custom-control-label font-14" for="same-address">Запомнить меня</label>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Вход</button>
                                {{--<p class="font-14 text-center mt-15">Having trouble logging in?</p>
                                <div class="option-sep">or</div>
                                <div class="form-row">
                                    <div class="col-sm-6 mb-20"><button class="btn btn-indigo btn-block btn-wth-icon"> <span class="icon-label"><i class="fa fa-facebook"></i> </span><span class="btn-text">Login with facebook</span></button></div>
                                    <div class="col-sm-6 mb-20"><button class="btn btn-sky btn-block btn-wth-icon"> <span class="icon-label"><i class="fa fa-twitter"></i> </span><span class="btn-text">Login with Twitter</span></button></div>
                                </div>
                                <p class="text-center">Do have an account yet? <a href="#">Sign Up</a></p>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->

</div>
<!-- /HK Wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="/themes/mintos/vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/themes/mintos/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/themes/mintos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="/themes/mintos/dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="/themes/mintos/dist/js/dropdown-bootstrap-extended.js"></script>

<!-- FeatherIcons JavaScript -->
<script src="/themes/mintos/dist/js/feather.min.js"></script>

<!-- Init JavaScript -->
<script src="/themes/mintos/dist/js/init.js"></script>
</body>
</html>