<header class="main-header">
    <div class="d-flex align-items-center logo-box justify-content-start">
        <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent"
            data-toggle="push-menu" role="button">
            <i data-feather="menu"></i>
        </a>
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- logo-->
            <div class="logo-lg">
                <span class="light-logo"><img src="{{ asset('images/write.png') }}" height="40" alt="logo"></span>
            </div>
        </a>
    </div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="app-menu">
            <ul class="header-megamenu nav">
                <li class="btn-group nav-item d-md-none">
                    <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu"
                        role="button">
                        <i data-feather="menu"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="waves-effect waves-light" data-toggle="modal" data-target="#modal-center">
                        <i data-feather="power" class="text-danger"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile px-20 pt-15 pb-10">
            <div class="d-flex align-items-center">
                <div class="image">
                    <img src="{{ asset('images/avatar/avatar-13.png') }}"
                        class="avatar avatar-lg bg-primary-light rounded100" alt="User Image">
                </div>
                <div class="info">
                    <p class=" px-20 mb-0" href="#">
                        <span>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
                        <span class="d-block">
                            <small>{{ auth()->user()->email }}</small>
                        </span>
                    </p>

                </div>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('home') }}">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>My Todos</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
