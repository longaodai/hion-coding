<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OHION - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="icon" type="image/png" href="{{ asset('common/images/logo.png') }}" />

    <!-- plugin css -->
    <link href="{{ asset('admin_libs_asset\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css">

    <!-- App css -->
    <link href="{{ asset('admin_libs_asset\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_libs_asset\css\icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_libs_asset\css\app.min.css') }}" rel="stylesheet" type="text/css">
    @yield('style')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @include('admin.layout.nav')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layout.menu')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div style="margin-bottom: 20px"></div>
                    @include('admin.notifications.toast')

                    @yield('contents')
                </div>

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('admin.layout.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('admin_libs_asset\js\vendor.min.js') }}"></script>

    <!-- Third Party js-->
    <script src="{{ asset('admin_libs_asset\libs\peity\jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin_libs_asset\libs\apexcharts\apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_libs_asset\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin_libs_asset\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('admin_libs_asset\js\pages\dashboard-1.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin_libs_asset\js\app.min.js') }}"></script>
    @yield('script')
</body>

</html>
