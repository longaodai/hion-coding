@extends('client.layout.master')

@section('content')
    <div class="container" id="hero">
        <div class="row justify-content-end">
            <div class="col-lg-6 hero-img-container">
                <a href="{{ route('home') }}">
                    <div class="hero-img">
                        <img src="{{ asset('common/images/banner.jpeg') }}" alt="{{ __('common.lbl_default_alt') }}"
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
                            <div class="author-img"><img src="{{ asset('common/images/author.jpg') }}"
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
