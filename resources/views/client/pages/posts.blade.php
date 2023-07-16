@extends('client.layout.master')

@section('content')
    <div class="container mt-2 mb-2 pt-5 pb-5" id="article-grid">
        <div class="row justify-content-center">
            @if ($dataPost->count() > 0)
                @foreach ($dataPost as $post)
                    <div class="col-xl-6 col-lg-12 text-center">
                        <a href="{{ route('post-detail', ['slug' => $post->post_slug]) }}">
                            <div class="article-card">
                                <div class="article-img">
                                    <img src="{{ asset(getPathImage(!empty($post->post_image) ? $post->post_image : '')) }}"
                                        alt="{{ !empty($post->post_title) ? $post->post_title : '' }}">
                                </div>
                                <div class="article-meta text-left">
                                    <p style="margin: 0;">
                                        <i>{{ !empty($post->updated_at) ? formatDate($post->updated_at, 'jS F Y') : '' }}</i>
                                    </p>
                                    <h2>{{ !empty($post->post_title) ? $post->post_title : '' }}</h2>
                                    {{-- <div class="tags"> --}}
                                    <a class="tag">
                                        {{ !empty($post->category->name) ? $post->category->name : '' }}</a>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-xl-6 col-lg-12 text-center">
                    <i>{{ __('post.lbl_not_data_available') }}</i>
                </div>
            @endif
        </div>
    </div>

    <div class="container text-center pb-3 mb-5">
        <div class="col-xl-12 col-lg-12 text-center">
            {{ $dataPost->render('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

@section('style-extend')
    <link rel="stylesheet" href="{{ asset('common/style/style.css') }}">
@endsection
