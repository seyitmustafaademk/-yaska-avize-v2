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

    @if($faqs != null)
    <section class="faq pb-5">
        <div class="container py-5">
            <div class="text-title text-center pb-5">
                <span class="text-gray-dark">{{ $faqs['top_title'] }}</span>
                <h1>{{ $faqs['title'] }}</h1>
                <p class="text-gray-dark">{{ $faqs['description'] }}</p>
            </div>
            <div class="row">
                <div class="accordion row" id="accordionPanelsStayOpenExample">
                    @foreach($faqs['faq'] as $faqs)
                        <div class="accordion-item col-lg-6 px-1">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne-{{$loop->index}}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne-{{$loop->index}}">
                                    {{ $faqs['faq_title'] }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne-{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne-{{$loop->index}}">
                                <div class="accordion-body">
                                    {!! $faqs['faq_description'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                <div class="col-lg-6">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                    Met onze in-house kennis en kunde op
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFor">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFor">
                                    Met onze in-house kennis en kunde op
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFor" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive">
                                    Met onze in-house kennis en kunde op
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
    @endif

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
                                            <span>{{ $comment['user_name'] }}</span>
                                            <span class="text-primary d-block">{{ $comment['user_footer'] }}</span>
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