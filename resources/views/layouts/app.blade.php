@include('layouts.header')
    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    @include('layouts.nav')
@include('layouts.sidenav')
<!-- BEGIN: Content-->
<div class="app-content content">
  
	    
  <div class="content-overlay"></div>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.footer')