@extends('front.layout.master')

@section('footer-center')
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.min.js') }}"></script>
@endsection

@section('footer-bottom')
    <script>
        jQuery(document).ready(function () {
            jQuery('.blogSidebar').theiaStickySidebar({
                additionalMarginTop: 130,
                minWidth: 991,
            });
        });
    </script>
@endsection

@section('content')
    <section class="blog-wrapper" style="padding-top: 140px;">
        <div class="container">
            <div class="blog-info-top">
                <h1 class=" ">{{ $__title }}</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.homepage') }}">Startseite</a>
                        </li>
                        <li class="breadcrumb-item active -50" aria-current="page">{{ $__title }}</li>
                    </ol>
                </nav>
            </div>

            <div class="row justify-content-between">
                <div class="col-xl-8">
                    @foreach($posts as $post)
                        @php

                        @endphp
                        <div class="blog-inner1 py-3 shadow-sm mt-5 p-5">
                            @if(isset($post->image) || $post->image == 'null')
                                <img src="{{ asset(str_replace('\\', '/', $post->image)) }}" alt="{{ $post->title }}" class="w-100">
                            @endif
                            <div class="d-flex justify-content-center justify-content-lg-start py-3">
                                <div>
                                    <i class="bi bi-person pe-2"></i>
                                    <span class="fs-08 fw-lighter">Mustafa Tahta</span>
                                </div>
                                <div class="mx-4">
                                    <i class="bi bi-calendar3 pe-2"></i>
                                    <span class="fs-08 fw-lighter">{{ date_format( date_create($post->created_at), 'Y-m-d' ) }}</span>
                                </div>
                                <div>
                                    <i class="bi bi-chat-left-quote pe-2"></i>
                                    <span class="fs-08 fw-lighter">{{ $post->category_name }}</span>
                                </div>
                            </div>
                            <h3 class="py-3">{{ $post->title }}</h3>

                            <a href="{{ route('front.blog-detail', $post->slug) }}" class="btn mainBtn">LEARN MORE <i class="bi bi-arrow-right fw-bold"></i></a>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-3 blogSidebar pt-3">
                    <div class="blogSidebar-inner theiaStickySidebar ">
                        <div class="category bg-white py-4 mb-4 rounded-3">
                            <h4>KATEGORIE</h4>
                            <hr style="height: 3px; border-radius: 10%;">
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('front.show-category', $category->category_name) }}">
                                        <span>{{ $category->category_name }}</span>
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="last-news py-4 mb-4">
                            <h4 class="text-uppercase">neuesten Nachrichten</h4>
                            <hr style="height: 3px; border-radius: 10%;">
                            <div class="news-order-wrap">
                                @foreach($latest_news as $latest_new)
                                <div class="news-order">
                                    <div>
                                        <img src="{{ $latest_new->image != null ? url($latest_new->image) : '#' }}" alt="">
                                    </div>
                                    <div class="news-text ms-4">
                                        <p>{{ $latest_new->title }}</p>
                                        <span class="d-block text-muted fs-08">
                                            <i class="bi bi-calendar3 pe-2"></i>
                                            {{ date_format( date_create($latest_new->created_at), 'Y-m-d' ) }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection