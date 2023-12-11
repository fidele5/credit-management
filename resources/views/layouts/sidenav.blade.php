!-- BEGIN: Main Menu-->
  <div class="main-menu menu-fixed  menu-light  menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto">
          <a class="navbar-brand" href="index.html">
            <div class="brand-logo">
              <img src="/images/logo/logo.png" class="logo" alt="">
            </div>
            <h2 class="brand-text mb-0">
              Frest
            </h2>
          </a>
        </li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
      <li class="nav-item ">
        <a href="{{ route('home') }}" >
          <i class="bx bx-home-alt"></i>
          <span class="menu-title">Acceuil</span>
        </a>

      </li>
      <li class="navigation-header"><span>Credit</span></li>
      <li class="nav-item ">
        <a href="{{ route('credit.index') }}" >
          <i class="bx bx-envelope"></i>
          <span class="menu-title">Credits</span>
        </a>
      </li>

      <li>
      <a href="{{ route('credit-type.index') }}" >
          <i class="bx bxs-spreadsheet"></i>
          <span class="menu-title">Type de credit</span>
        </a>
      </li>

      <li class="navigation-header"><span>Client</span></li>
      <li class="nav-item ">
        <a href="{{ route('client.index') }}" >
          <i class="bx bxs-user-rectangle"></i>
          <span class="menu-title">Client</span>
        </a>
      </li>

      <li class="navigation-header"><span>Agent</span></li>
      <li class="nav-item ">
        <li class="nav-item ">
            <a href="{{ route('agent.index') }}" >
                <i class="bx bx-user"></i>
                <span class="menu-title">Agent</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('agent-position.index') }}" >
                <i class="bx bxs-user-badge"></i>
                <span class="menu-title">Agent Position</span>
            </a>
      </li>

      <li class="nav-item ">
        <a href="{{ route('appointment.index') }}" >
          <i class="bx bx-calendar-event"></i>
          <span class="menu-title">Rendez-vous</span>
        </a>
      </li>
    </ul>
  </div>
</div>
  <!-- END: Main Menu-->
