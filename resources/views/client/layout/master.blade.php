<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="CukqLbnviAeft9o1JyX3SqsSQPU1LKEx_11H1H2oTQU" />
    <link rel="icon" type="image/png" href="{{ asset('common/images/logo.png') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles.css') }}">

    @include('client.layout.meta')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KYL5SNQ364"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KYL5SNQ364');
    </script>

    <style>
        .pagination {
            justify-content: center;
        }

        .badge-sm {
            min-width: 1em;
            padding: .1em 1em !important;
            margin-left: .1em;
            margin-right: .1em;
            color: white !important;
            cursor: pointer;
            font-size: .8em !important;
        }

        .navbar-toggler {
            outline: none !important;
        }
    </style>
    <style>
        div[style*="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"] {
            display: none !important;
        }

        img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
            display: none !important;
        }

        a[href*="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
            display: none !important;
        }
    </style>
    @yield('style-extend')
</head>

<body>

    <div class="container-fluid" id="header">

        <!-- NAV -->
        @include('client.layout.nav')
        <!-- END NAV -->

        <!-- CONTENT -->
        @yield('content')
        <!-- END CONTENT -->

        <!-- FOOTER  -->
        @include('client.layout.footer')
        <!-- END FOOTER  -->

    </div>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    @yield('script-extend')

</body>

</html>
