@extends('client.layout.master')

@section('content')
    <div class="container" id="hero">
        <div class="row justify-content-end">
            <div class="col-lg-6 hero-img-container">
                <a href="{{ route('home') }}">
                    <div class="hero-img">
                        <img src="{{ asset('common/images/hion-coding_top_everything_will_be_ok.jpg.webp') }}" alt="{{ __('common.lbl_default_alt') }}"
                            loading="lazy">
                    </div>
                </a>
            </div>

            <div class="col-lg-9">
                <div class="hero-title">
                    <a href="{{ route('home') }}">
                        <h1>{{ __('home.lbl_desciption') }}</h1>
                    </a>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="hero-meta">
                    <h2>{{ __('home.lbl_desciption_sub') }}</>
                        <div class="author">
                            <div class="author-img"><img src="{{ asset('common/images/hion-coding_logo.png.webp') }}"
                                    alt="{{ __('common.lbl_default_alt') }}" loading="lazy"></div>
                            <div class="author-meta">
                                <span class="author-name">{{ __('common.lbl_name_author') }}</span>
                                <span class="author-tag">{{ __('common.lbl_name_bloger') }}</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="hero-meta hero-title-post mt-5 mb-1 text-center">
        <h1>My Packages</h1>
        <h2>Share and learn new knowledge.</h2>
    </div>
    <div class="container mt-2 mb-2 pt-0 pb-3" id="article-grid">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4 article-card">
                <img src="{{ asset('common/images/laravel-repository-pattern.webp') }}" style="max-width: 100%;height: 175px;object-fit: cover;" class="card-img-top" alt="Hion Coding - Repository-pattern">
                <div class="card-body article-meta" style="margin: 0 auto;">
                    <h3 class="card-title text-center">Repository-pattern</h3>
                    <p class="text-center">My package support generator repository pattern for Laravel</p>
                    <div class="container text-center mb-2">
                        <a href="https://github.com/longaodai/repository-pattern" target="_blank" class="btn vcl-buttons vcl-btn-hover vcl-color-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4 article-card">
                <img src="{{ asset('common/images/ssh-server.webp') }}" style="max-width: 100%;height: 175px;object-fit: cover;" class="card-img-top" alt="Hion Coding - Package SSH Server">
                <div class="card-body article-meta" style="margin: 0 auto;">
                    <h3 class="card-title text-center">Package SSH Server</h3>
                    <p class="text-center">My package support ssh server for auto deploy in Github actions</p>
                    <div class="container text-center mb-2">
                        <a href="https://github.com/longaodai/ssh-server" target="_blank" class="btn vcl-buttons vcl-btn-hover vcl-color-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4 article-card">
                <img src="{{ asset('common/images/php-development.webp') }}" style="max-width: 100%;height: 175px;object-fit: cover;object-position: center left;" class="card-img-top" alt="Hion Coding - Hion Framework">
                <div class="card-body article-meta" style="margin: 0 auto;">
                    <h3 class="card-title text-center">Hion Framework</h3>
                    <p class="text-center">Hion is a simple PHP framework <br> (is in development stage)</p>
                    <div class="container text-center mb-2">
                        <a href="https://github.com/longaodai/Hion" target="_blank" class="btn vcl-buttons vcl-btn-hover vcl-color-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="hero-meta hero-title-post mt-5 mb-1 text-center">
        <h1>News</h1>
        <h2>Share and learn new knowledge.</h2>
    </div>
    <div class="container mt-2 mb-2 pt-0 pb-3" id="article-grid">
        <div class="row justify-content-center">
            @if ($listPost->count() > 0)
                @foreach ($listPost as $post)
                    <div class="col-xl-6 col-lg-12 text-center">
                        <a href="{{ route('post-detail', ['slug' => $post->post_slug]) }}">
                            <div class="article-card">
                                <div class="article-img">
                                    <img src="{{ asset(getPathImage(!empty($post->post_image) ? $post->post_image : '')) }}"
                                        alt="{{ !empty($post->post_title) ? $post->post_title : __('common.lbl_default_alt') }}"
                                        loading="lazy" style="height: 160px;">
                                </div>
                                <div class="article-meta text-left">
                                    <p style="margin: 0;">
                                        <i>{{ !empty($post->updated_at) ? formatDate($post->updated_at, 'jS F Y') : '' }}</i>
                                    </p>
                                    <h3>{{ !empty($post->post_title) ? $post->post_title : '' }}</h3>
                                    <div class="tags">
                                        <p class="tag">
                                            {{ !empty($post->category->name) ? $post->category->name : '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container text-center pb-3 mb-5">
        <a href="{{ route('posts') }}"
            class="btn vcl-buttons vcl-btn-hover vcl-color-primary">{{ __('common.view_more') }}</a>
    </div>
@endsection

@section('style-extend')
    <link rel="stylesheet" href="{{ asset('common/style/style.css') }}">
@endsection
