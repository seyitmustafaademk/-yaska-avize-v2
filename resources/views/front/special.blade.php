@extends('front.layout.master')

@section('content')

    <x-section-services-intro/>

    @if($section2 != null)
    <section class="how-to">
        <div class="container text-center">
            <div class="text-title pb-4 ">
                <span>{{ $section2['top_title'] }}</span>
                <h1>{{ $section2['title'] }}</h1>
            </div>
            <p>{!! $section2['description'] !!}</p>
        </div>
    </section>
    @endif

    @if($section3 != null)
    <section class="murset py-lg-2">
        <div class="container py-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="img">
                        <div class="text-title d-lg-none pb-4">
                            <span>{{ $section3['top_title'] }}</span>
                            <h1>{{ $section3['title'] }}</h1>
                        </div>
                        <img src="{{ url($section3['image']['url']) }}" alt="{{ $section3['image']['url'] }}" class="pt-lg-5">
                        <div class="img-info d-none d-xxl-block">
                            {{ $section3['top_title'] }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pt-4 me-lg-5 pt-lg-5">
                    <div class="text-title d-none d-lg-block">
                        <span>{{ $section3['top_title'] }}</span>
                        <h1>{{ $section3['title'] }}</h1>
                    </div>
                    <p>{!! $section3['description'] !!}</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <x-section-services-shipping/>

{{--    <x-section-homepage-faq/>--}}
    <section class="faq-new">
        <div class="container">
            <div class="text-title text-center pb-5">
                <span>{{ $faqs['top_title'] }}</span>
                <h1>{{ $faqs['title'] }}</h1>
                <p>{{ $faqs['description'] }}</p>
            </div>

            <div class="accordion">
                @foreach($faqs['faq'] as $key => $faq)
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="false">
                            <span class="accordion-title">{{ $faq['faq_title'] }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>{!! $faq['faq_description'] !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- User Comments --}}
    @if($comments != null)
    <section class="testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-title text-title text-center">
                <h1>{{ $comments['title'] }}</h1>
                <p>{{ $comments['description'] }}</p>
            </div>
            <div class="testimonial-body">
                <div class="swiper testimonialSwiper">
                    <div class="swiper-wrapper">
                        @foreach($comments['comments'] as $comment)
                            <div class="swiper-slide">
                                <div class="testimonial-body-item">
                                    <div class="testimonial-body-item-top">
                                        <img src="{{ asset('assets/img/comment-icon.png') }}" alt="Comment Icon" width="50" height="auto">
                                        <div class="ms-3">
                                            <span>{{ $comment['customer_name'] }}</span>
                                            <span class="text-primary d-block">{{ $comment['customer_title'] }}</span>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/img/special_star.png') }}" alt="" class="img-fluid py-3">
                                    <p>{{ $comment['user_comment'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-scrollbar mt-5 w-75 opacity-100 text-white bg-primary"></div>
                    <div class="buttonSpecialwrapper text-end me-md-4">
                        <button class="prevBtn" id="prevBtn"><i class="bi bi-chevron-left"></i></button>
                        <button class="nextBtn" id="nextBtn"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- References --}}
    <x-section-reference/>
@endsection