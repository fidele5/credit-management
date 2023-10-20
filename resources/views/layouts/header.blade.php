<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('adminn/assets/images/favicon.png') }}">
    <title>admin</title>

    <!-- Custom CSS -->
    <link href="{{ asset('/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/extra-libs/toastr/dist/build/toastr.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{{ asset('/dist/css/style.min.css') }}" rel="stylesheet">

    @switch(Route::currentRouteName())
        @case("calendar")
    <link href="/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
            @break
        @case("contacts")
    <link href="/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
            @break
            @case('categoryes')

            @break
        @default
            
    @endswitch

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->