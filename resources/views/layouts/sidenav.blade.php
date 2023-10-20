
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            @if (Auth::check())
                            <div class="user-profile d-flex no-block dropdown mt-3">
                                <div class="user-pic"><img src="/adminn/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu ml-2">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium">{{ Auth::user()->username }} <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><span class="__cf_email__" data-cfemail="40362132352e00272d21292c6e232f2d">[email&#160;protected]</span></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="/account/profile"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off mr-1 ml-1"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 mt-2"><a href="/" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-home"></i> Accueil </a></li>
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="/admin" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard </span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('messages.index') }}" aria-expanded="false"><i data-feather="message-circle" class="feather-icon"></i><span class="hide-menu">Chat Apps</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('calendar') }}" aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span class="hide-menu">Calendar</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('contacts') }}" aria-expanded="false"><i data-feather="phone" class="feather-icon"></i><span class="hide-menu">Contact</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Parametres</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{ route('categories') }}" class="sidebar-link"><i class="fa fa-tags" aria-hidden="true"></i><span class="hide-menu">Categories </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('communes.index') }}" class="sidebar-link"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="hide-menu">Communes</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('villes.index') }}" class="sidebar-link"><i class="fa fa-building" aria-hidden="true"></i> <span class="hide-menu">Villes</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admins.index') }}" class="sidebar-link"><i class="fa fa-user" aria-hidden="true"></i> <span class="hide-menu">Admins</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{  route('articles.index')  }}" aria-expanded="false"><i data-feather="shopping-cart" class="feather-icon"></i><span class="hide-menu">Produits</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('users.index') }}" aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span class="hide-menu">Users</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="authentication-login1.html" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">