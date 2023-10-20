
<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->

  

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from www.pixinvent.com/demo/frest-bootstrap-laravel-admin-dashboard-template/demo-4/auth-login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 May 2020 11:19:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="xyiBo1teyHSSetQs0ZEMM3aCcYz5YtlRBSJ4vbGZ">

    <title>Login Page - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">

    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="vendors/css/vendors.min.css">
            <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/css/components.css">
    <link rel="stylesheet" type="text/css" href="/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/css/themes/semi-dark-layout.css">
        <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout 1-column navbar-sticky bg-full-screen-image footer-static blank-page
   light-layout " data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
         <!-- login page start -->
        <section id="auth-login" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-md-6 col-12 px-0">
                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                    <div class="card-header pb-1">
                    <div class="card-title">
                        <h4 class="text-center mb-2">Welcome Back</h4>
                    </div>
                    </div>
                    <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex flex-md-row flex-column justify-content-around">
                        <a href="#" class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                            <i class="bx bxl-google font-medium-3"></i>
                            <span class="pl-50 d-block text-center">Google</span>
                        </a>
                        <a href="#" class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                            <i class="bx bxl-facebook-square font-medium-3"></i>
                            <span class="pl-50 d-block text-center">Facebook</span>
                        </a>
                        </div>
                        <div class="divider">
                        <div class="divider-text text-uppercase text-muted">
                            <small>or login with email</small>
                        </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                                @csrf
                        <div class="form-group mb-50">
                            <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                            <div class="text-left">
                            <div class="checkbox checkbox-sm">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="checkboxsmall" for="exampleCheck1">
                                <small>Keep me logged in</small>
                                </label>
                            </div>
                            </div>
                            <div class="text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="card-link"><small>{{ __('Forgot Your Password?') }}</small></a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary glow w-100 position-relative">{{ __('Login') }}
                            <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                        </button>
                        </form>
                        <hr>
                        <div class="text-center">
                        <small class="mr-25">Don't have an account?</small>
                        <a href="{{route('register') }}"><small>Sign up</small></a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                <div class="card-content">
                    <img class="img-fluid" src="/images/pages/login.png" alt="branding logo">
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
<!-- login page ends -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

    
    <!-- BEGIN: Vendor JS-->
    <script>
        var assetBaseUrl = "index.html";
    </script>
    <script src="/vendors/js/vendors.min.js"></script>
    <script src="/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
        <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
        <script src="/js/scripts/configs/horizontal-menu.js"></script>
        <script src="/js/core/app-menu.js"></script>
    <script src="/js/core/app.js"></script>
    <script src="/js/scripts/components.js"></script>
    <script src="/js/scripts/footer.js"></script>
    <script src="/js/scripts/customizer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
        <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

<!-- Mirrored from www.pixinvent.com/demo/frest-bootstrap-laravel-admin-dashboard-template/demo-4/auth-login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 May 2020 11:19:35 GMT -->
</html>