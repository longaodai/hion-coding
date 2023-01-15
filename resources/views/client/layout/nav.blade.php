<nav id="navbar-main" class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logo-image"
                src="{{ asset('common/images/logo.png') }}"></a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('common.lbl_home_nav') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('common.lbl_about_nav') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts') }}">{{ __('common.lbl_post_nav') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" target="_blank"
                        href="https://giaiphap2022.000webhostapp.com/">{{ __('common.lbl_funny_nav') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">{{ __('common.lbl_contact_nav') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
