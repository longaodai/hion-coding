<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-user"></i>
                <span class="pro-user-name ml-1">
                    {{ !empty(Auth::user()->name) ? Auth::user()->name : '' }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Welcome !
                    </h5>
                </div>

                {{-- <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a> --}}

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('home') }}" target="_blank" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('common/images/logo.png') }}" alt="{{ __('common.lbl_default_alt') }}" height="80"
                    style="margin-top: 10px" loading="lazy">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('common/images/logo.png') }}" alt="{{ __('common.lbl_default_alt') }}" height="28"
                    loading="lazy">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>
    </ul>
</div>
