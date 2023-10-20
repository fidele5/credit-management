
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="xyiBo1teyHSSetQs0ZEMM3aCcYz5YtlRBSJ4vbGZ">
    <title>Register Page - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/vendors/css/vendors.min.css">

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
         <!-- register section starts -->
        <section class="row flexbox-container">
        <div class="col-xl-8 col-10">
            <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- register section left -->
                <div class="col-md-6 col-12 px-0">
                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                    <div class="card-header pb-1">
                    <div class="card-title">
                        <h4 class="text-center mb-2">Sign Up</h4>
                    </div>
                    </div>
                    <div class="text-center">
                    <p> <small> Please enter your details to sign up and be part of our great community</small>
                    </p>
                    </div>
                    <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-50">
                                    <label for="first_name">first name</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 mb-50">
                                    <label for="last_name">last name</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-50">
                                <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-bold-600" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-2">
                                <label class="text-bold-600" for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary glow position-relative w-100">
                                SIGN UP<i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                            </button>
                        </form>
                        <hr>
                        <div class="text-center"><small class="mr-25">Already have an account?</small>
                        <a href="{{ route('login') }}"><small>Sign in</small> </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- image section right -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <img class="img-fluid" src="/images/pages/register.png" alt="branding logo">
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- register section endss -->
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

<!-- Mirrored from www.pixinvent.com/demo/frest-bootstrap-laravel-admin-dashboard-template/demo-4/auth-register by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 May 2020 11:23:41 GMT -->
</html>
