@extends('client.layout.master')

@section('content')
    <div class="container mt-2 mb-2 pt-5 pb-5" id="article-grid" style="height: calc(100vh - 120px - 200px)">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <a href="{{ __('common.link_facebook') }}" target="_blank">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('common/images/logo.png') }}" alt="{{ __('common.lbl_default_alt') }}"
                                loading="lazy">
                        </div>

                        <div class="article-meta text-left">
                            <h2>404 NOT FOUND</h2>
                            <p>{!! __('common.msg_detail_contact_admin') !!}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
