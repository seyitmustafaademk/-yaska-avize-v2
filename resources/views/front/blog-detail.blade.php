@extends('front.layout.master')

@section('footer-center')
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('ResizeSensor.min.js') }}"></script>
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
                <h1>{{ $post->title }}</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.homepage') }}">Startseite</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $__title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-between">
                <div class="col-xl-8">
                    <div class="blog-inner1 py-3">
                        <div class="d-flex justify-content-center justify-content-lg-start py-3">
                            <div>
                                <i class="bi bi-person pe-2"></i>
                                <span class="fs-08 fw-lighter">
                                    MUSTAFA TAHTA
                                </span>
                            </div>
                            <div class="mx-4">
                                <i class="bi bi-calendar3 pe-2"></i>
                                <span class="fs-08 fw-lighter">
                                    {{ $post->created_at }}
                                </span>
                            </div>
                            <div>
                                <i class="bi bi-chat-left-quote pe-2"></i>
                                <span class="fs-08 fw-lighter">
                                    {{ $post->category_name }}
                                </span>
                            </div>
                        </div>
                        <h3 class="py-3">{{ $post->title }}</h3>
                        <div>
                            {!!  $post->content !!}
                        </div>


                        <div class="d-md-flex justify-content-between align-items-center my-4">
                            <h5>POPULAR TAGS</h5>
                            <div>
                                <div href="#" class="btn btn-outline-dark active mb-2 mb-md-0">AVIZELER</div>
                                <div href="#" class="btn btn-outline-dark mb-2 mb-md-0">ÖZEL YAPIM AVİZE</div>
                                <div href="#" class="btn btn-outline-dark mb-2 mb-md-0">AVİZE NASIL YAPILIR?</div>
                                <div href="#" class="btn btn-outline-dark mb-2 mb-md-0">AVİZE TAŞI</div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 blogSidebar pt-3">
                    <div class="blogSidebar-inner theiaStickySidebar ">
                        <div class="category bg-white p-4 mb-4 rounded-3">
                            <h4>CATEGORY</h4>
                            <hr style="height: 3px; border-radius: 10%;">
                            <ul>
                                <li><a href="#"><span>Web Development</span><i class="bi bi-chevron-right"></i></a></li>
                                <li><a href="#"><span>EMAIL MARKETING</span><i class="bi bi-chevron-right"></i></a></li>
                                <li><a href="#"><span>IT CONSULTANCY</span><i class="bi bi-chevron-right"></i></a></li>
                                <li><a href="#"><span>BUSINESS CONSULTING</span><i class="bi bi-chevron-right"></i></a></li>
                                <li><a href="#"><span>APPS DEVELOPMENT</span><i class="bi bi-chevron-right"></i></a></li>
                                <li><a href="#"><span>MEDIA MARKETING</span><i class="bi bi-chevron-right"></i></a></li>
                                <li><a href="#"><span>SEO OPTIMIZATIONS</span><i class="bi bi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="last-news py-4 mb-4">
                            <h4>SON HABERLER</h4>
                            <hr style="height: 3px; border-radius: 10%;">
                            <div class="news-order-wrap">
                                <div class="news-order">
                                    <div>
                                        <img src="{{ asset('assets/img/blog/blog-img1.png') }}" alt="">
                                    </div>
                                    <div class="news-text ms-4">
                                        <p>Build Seamless spreadshet ımport</p>
                                        <span class="d-block text-muted fs-08"><i class="bi bi-calendar3 pe-2"></i>21 MAY 2022</span>
                                    </div>
                                </div>
                                <div class="news-order">
                                    <div>
                                        <img src="{{ asset('assets/img/blog/blog-img2.png') }}" alt="">
                                    </div>
                                    <div class="news-text ms-4 ms-md-0 ms-lg-4">
                                        <p>Build Seamless spreadshet ımport</p>
                                        <span class="d-block text-muted fs-08"><i class="bi bi-calendar3 pe-2"></i>23 MAY 2022</span>
                                    </div>
                                </div>
                                <div class="news-order">
                                    <div>
                                        <img src="{{ asset('assets/img/blog/blog-img3.png') }}" alt="">
                                    </div>
                                    <div class="news-text ms-4">
                                        <p>Build Seamless spreadshet ımport</p>
                                        <span class="d-block text-muted fs-08">
                                            <i class="bi bi-calendar3 pe-2"></i>
                                            24 JUNE 2022
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection