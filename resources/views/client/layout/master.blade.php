<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="s4zFEEY9fePGrWTBquNlrPGgxJxAid4nXdh23U9FHyE" />
    <link rel="icon" type="image/png" href="{{ asset('common/images/logo.png') }}" />
    @include('client.layout.meta')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('common/style/style.css') }}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZWG0GND6W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-YZWG0GND6W');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5057603830951739"
        crossorigin="anonymous"></script>

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

        <button id="backToTopButton" title="Back to Top" class="btn vcl-buttons vcl-btn-hover vcl-color-primary"><i
                class="fa fa-arrow-up" aria-hidden="true"></i></button>
    </div>
    <!-- END -->
    @include('client.modules.schema.organization')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    @yield('script-extend')
    <script src="{{ asset('client/script.js') }}"></script>
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo-rails';
    </script>
    <script>
        $('#navbarToggle').click(function() {
            $('#navbarToggleSP').toggleClass('show')
        })
    </script>
</body>

</html>
