<footer class="container-fluid mt-1 p-4">
    <div class="container ">
        <div class="row pb-1" style="align-items: center">
            <!-- Footer logo -->
            <div class="col-md-6  pb-2"><img class="logo-image" src="{{ asset('common/images/logo.png') }}"></div>
            <!-- footer social links -->
            <div class="col-md-6">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-light" target="_blank"
                            href="{{ __('common.link_facebook') }}"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-light" href="mailto:{{ __('common.info_email_address') }}"><i
                                class="fab fa-google"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-light" target="_blank"
                            href="{{ __('common.link_youtube') }}"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>

            </div>

            <hr>
        </div>
        <hr>

        <!-- copyright text -->
        <div class="row pt-2">
            <div class="col-lg-12 text-center">
                <span>&copy {{ date('Y') }} <a href="#">{{ __('common.lbl_name_site') }}</a></span>
            </div>
        </div>
    </div>
</footer>
