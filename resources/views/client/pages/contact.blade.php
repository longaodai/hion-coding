@extends('client.layout.master')

@section('style-extend')
    <style>
        .article-img {}
    </style>
@endsection

@section('content')
    <div class="hero-meta hero-title-post mt-5 mb-1 text-center">
        <h1>{{ __('common.lbl_contact_title') }}</h1>
        <h2>{{ __('home.lbl_desciption') }}</h2>
        <br>
    </div>
    <div class="container mt-2 mb-2 pb-5" id="article-grid">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 text-center">
                <div class="article-img mt-md-2"
                    style="max-width: 250px; height: 250px; overflow: hidden; border-radius: 100%;">
                    <img src="{{ asset('common/images/author_blog.webp') }}" alt="{{ __('common.lbl_about_title') }}"
                        loading="lazy">
                </div>
                <div class="info-admin mt-3 hero-title-post">
                    <h3>{{ __('common.lbl_name_author') }}</h3>
                    <p>
                        Software Engineer in Vietnam
                    </p>
                </div>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-light icon-contact" target="_blank"
                            href="{{ __('common.link_facebook') }}" style="color: #0e08ff !important"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-light icon-contact"
                            href="mailto:{{ __('common.info_email_address') }}" style="color: #000 !important"><i
                                class="fa fa-solid fa-envelope"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-light icon-contact" target="_blank"
                            href="{{ __('common.link_youtube') }}" style="color: #ff0808 !important"><i
                                class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <p> Hello everyone, <br />
                    Thank you for choosing <b><i>"Hion Coding"</i></b> as your trusted source for news, information, and
                    inspiration. We look forward to being your digital companion on this exciting journey through the
                    dynamic landscape of technology and beyond. </p>
                <hr>
                <form action="{{ route('send_inquiry') }}" method="post" id="myForm" class="mt-2">
                    @csrf
                    <div class="hero-meta hero-title-post">
                        <h3 class="text-center">Form Inquiry</h3>
                    </div>
                    <div class="form-group">
                        <label for="lbl_full_name">Full name: <span class="text-danger">*</span></label>
                        <input type="text" name="full_name" id="lbl_full_name" class="form-control"
                            placeholder="Example: Hion Coding" value="{{ old('full_name') }}">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lbl_email">Email: <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="lbl_email" class="form-control"
                            placeholder="Example: contact@hioncoding.com" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lbl_message">Message: <span class="text-danger">*</span></label>
                        <textarea name="message" id="lbl_message" cols="30" rows="4" class="form-control">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group text-center">
                        @if (Session::has('error-send'))
                            <span class="text-danger">{{ Session::get('error-send') }}</span>
                        @endif
                        <button type="submit" id="btn-submit" class="btn vcl-buttons vcl-btn-hover vcl-color-primary">Send
                            Inquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script-extend')
    <script src="{{ asset('client/contact.js') }}"></script>
@endsection
