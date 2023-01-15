<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="la la-cube"></i>
                        <span> {{ __('common.lbl_categories') }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.category.list') }}">{{ __('common.lbl_list') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.create') }}">{{ __('common.lbl_create') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="la la-cube"></i>
                        <span> {{ __('common.lbl_posts') }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="">{{ __('common.lbl_list') }}</a>
                        </li>
                        <li>
                            <a href="">{{ __('common.lbl_create') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>