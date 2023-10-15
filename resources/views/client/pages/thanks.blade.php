@extends('client.layout.master')

@section('style-extend')
    <style>
        .article-img {}
    </style>
@endsection

@section('content')
    <div class="hero-meta hero-title-post mt-5 mb-1 text-center">
        <h1>{{ __('common.lbl_thank_title') }}</h1>
        <h2>{{ __('home.lbl_desciption') }}</h2>
        <br>
    </div>
    <div class="container mt-2 mb-2 pb-5" id="article-grid" style="height: calc(100vh - 120px - 345px)">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="text-center">
                    Email has been sent successfully! We will review and respond as soon as possible. Thank you for
                    contacting us. </p>
            </div>
        </div>
        <div class="container text-center pb-3 mb-5">
            <a href="{{ route('home') }}"
                class="btn vcl-buttons vcl-btn-hover vcl-color-primary">{{ __('common.lbl_back_to_top') }}</a>
        </div>
    </div>
@endsection
