@extends('front.layout.master')

@section('head-center')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/imagehover.css/2.0.0/css/imagehover.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('head-bottom')
    <style>
        #section10 {
            position: relative;
            width: 100%;
            height: 100%;
        }
        #section10::after {
            position: absolute;
            bottom: 0;
            left: 0;
            content: '';
            width: 100%;
            height: 80%;
            background: -webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.8) 80%,rgba(0,0,0,.8) 100%);
            background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.8) 80%,rgba(0,0,0,.8) 100%);
        }
        .demo a {
            position: absolute;
            bottom: 20px;
            left: 50%;
            z-index: 2;
            display: inline-block;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
            color: #fff;
            font : normal 400 20px/1 'Josefin Sans', sans-serif;
            letter-spacing: .1em;
            text-decoration: none;
            transition: opacity .3s;
        }
        .demo a:hover {
            opacity: .5;
        }

        #section10 a {
            padding-top: 45px;
        }
        #section10 a span {
            position: absolute;
            top: 0;
            left: 50%;
            width: 20px;
            height: 35px;
            margin-left: -10px;
            border: 2px solid #fff;
            border-radius: 50px;
            box-sizing: border-box;
        }
        #section10 a span::before {
            position: absolute;
            top: 5px;
            left: 50%;
            content: '';
            width: 6px;
            height: 6px;
            margin-left: -3px;
            background-color: #fff;
            border-radius: 100%;
            -webkit-animation: sdb10 2s infinite;
            animation: sdb10 2s infinite;
            box-sizing: border-box;
        }
        @-webkit-keyframes sdb10 {
            0% {
                -webkit-transform: translate(0, 0);
                opacity: 0;
            }
            40% {
                opacity: 1;
            }
            80% {
                -webkit-transform: translate(0, 20px);
                opacity: 0;
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes sdb10 {
            0% {
                transform: translate(0, 0);
                opacity: 0;
            }
            40% {
                opacity: 1;
            }
            80% {
                transform: translate(0, 20px);
                opacity: 0;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
@endsection

@section('footer-center')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('footer-bottom')
    <script>
        $("#contact-form").submit(function( event ) {
            event.preventDefault();
            var post_url = $(this).attr("action");
            var request_method = $(this).attr("method");
            var form_data = $(this).serialize();
            var r_message = $('#contact-message');

            $.ajax({
                url: post_url,
                type: request_method,
                data: form_data,
                success: function (response){
                    console.log(response.status_message);
                    var status_code = response.status_code;
                    if(status_code == "success")
                        r_message.css('color', 'green');
                    else if(status_code == "warning")
                        r_message.css('color', 'orange');
                    else
                        r_message.css('color', 'red');
                    r_message.text(response.status_message);
                },
                error: function (response){
                    console.log(response);
                    r_message.css('color', 'red');
                    r_message.text("Bir hata oluştu!");
                }
            });
            $(this).trigger('reset');
        });
    </script>
@endsection

@section('content')

    @if(isset($section1))
        <section class="hero min-vh-100 position-relative overflow-hidden">
            <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
            <div class="hero-content-wrapper-inner position-absolute top-50 start-0 w-100 text-white m-auto translate-middle-y"
                 style="z-index: 4;">
                <div
                        class="h-100 row justify-content-center align-items-center text-center text-xl-start me-xl-5 pe-xxl-5">
                    <div class="home-hero-text mt-5 px-3 px-lg-5 col-xl-6 text-center">
                        <h2 class="mb-4 display-2 text-uppercase fw-500 lh-1">{!! $section1['title'] !!}</h2>
                        <p class="mb-4 text-white">{!! $section1['description'] !!}</p>
                    </div>
                </div>
            </div>

            <!--  -->
            <video src="/{{ 'assets/img/home/avizevideo.mp4' }}" class="position-absolute top-0 start-0 w-100 h-100" type="video/mp4"
                   autoplay muted loop style="object-fit: cover; z-index: 1;"></video>

        </section>
        <section id="section10" class="demo mb-4">
            <a href="#special-design" class="mb-5" style="font-size: 12px"><span></span></a>
        </section>
    @endif

    @if(isset($section2))
        <section class="special-design mt-5 pt-4" id="special-design">
            <div class="container-fluid gx-0 overflow-hidden">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="img">
                            <div class="text-title text-center d-lg-none pt-4 pb-0 mb-0">
                                <span>{{ $section2['top_title'] }}</span>
                                <h1>{{ $section2['top_title'] }}</h1>
                            </div>
                            <img src="{{ url($section2['image']['url']) }}" alt="" class="pt-2 pt-lg-0 pb-4 resizeImg">
                        </div>
                    </div>
                    <div class="col-lg-5 resizeParagraph px-4 px-lg-0">
                        <div class="text-title d-none d-lg-block">
                            <span>{{ $section2['top_title'] }}</span>
                            <h1>{{ $section2['top_title'] }}</h1>
                        </div>
                        <p>{!! $section2['description'] !!}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(isset($section3))
        <section class="different">
            <div class="container-fluid py-5 gx-0 overflow-hidden">
                <div class="row py-5 justify-content-between align-items-center">
                    <div class="col-xl-4 ps-xl-5 ms-xl-5 pe-xl-5">
                        @php
                            $contentt = '';
                            foreach ($section3 as $content){
                                $contentt = json_decode($content->content, TRUE);;
                            }
                        @endphp
                        <h1 class="text-uppercase display-3 fw-bold">{{ $contentt['desc_title'] }}</h1>
                        <p>{{ $contentt['description'] }}</p>
                    </div>
                        <div class="col-xl-7 d-lg-flex justify-content-between">
                            @foreach($section3 as $item)
                                @php
                                $section_data = json_decode($item->content, TRUE);
                                @endphp
                                <div class="position-relative item-differentSwiper m-auto shadow" style="width: 350px; height: 525px;">
                                    <a href="{{ $section_data['url'] }}">
                                        <img src="{{ $section_data['image']['url'] }}" alt="{{ $section_data['image']['name'] }}" width="350" height="525">
                                    </a>
                                    <div class="text-uppercase">{{ $section_data['title'] }}</div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Section 4 --}}
    <section class="popular-product py-5">
        <div class="container-fluid pb-lg-5">
            <div class="row justify-content-between align-items-start px-xl-4">
                <div class="col-xl-4 order-2 order-lg-1 ps-xl-5 ms-xl-5">
                    <div class="text-title mx-0">
                        <span class="text-white">Woche</span>
                        <h1>Populär Produkt</h1>
                        <p>Sie sind auf der Suche nach dem ganzbesonderen Licht? Dann haben Sie jetzt das</p>
                    </div>

                    <div class="nav nav-pills mt-5" id="v-pills-tab" role="tablist">
                        @foreach($section4 as $item)
                        <a class="nav-link my-2" id="v-pills-{{ $item->id }}-tab" data-bs-toggle="pill"
                           data-bs-target="#v-pills-{{ $item->id }}" type="button" role="tab" style="overflow: hidden; padding: 0; height: 300px;">
                            <img src="{{ json_decode($item->diameter_images)[0]->url }}" alt="{{ json_decode($item->diameter_images)[0]->name }}" style=" width: 100%; height: 200px; margin-bottom: 10px;">
                            <h5 class="pt-4 pb-3 fs-7" style="font-size: 15px!important;">{{ $item->product_name }}</h5>
                            <h5 class="pt-4 pb-3" style="font-size: 16px;">{{ $item->product_name }}</h5>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="tab-content" id="v-pills-tabContent" style="padding-top: 80px;">
                        @foreach($section4 as $item)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="v-pills-{{ $item->id }}" role="tabpanel">
                            <img src="{{ json_decode($item->product_images)[0]->url }}" alt="" width="100%" class="big-product" style=" max-height: 750px;">
                            <div class="tab-info shadow">
                                <div class="d-md-flex text-center text-md-start px-4 py-4 justify-content-center justify-content-md-between align-items-center">
                                    <h4 class="m-0">{{ $item->product_name }}</h4>
                                    <div>
                                        <div class="d-md-flex align-items-center justify-content-center justify-content-md-between">
                                            <p class="fs-4 d-md-inline-block m-0 fw-bold lh-1">€{{ number_format($item->list_price, 2, ',', '.') }}</p>
                                            <a href="{{ route('front.product-detail', $item->slug) }}" class="btn btnMain btn-outline-dark ms-md-3 my-3 my-lg-0">SIEHE PRODUKT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    @if(isset($section5))

        <section class="middlebg position-relative">
            <img src="{{ asset('assets/img/home/b4.jpg') }}" alt="" class="img-fluid w-100" style="z-index: -1; min-height: 600px; object-fit: cover;">
            <div class="container text-center text-white" style="z-index: 2;">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-3 fw-bold d-none d-lg-block">{{ $section5['top_title'] }}</h1>
                    <h1 class="display-3 fw-bold d-lg-none">{{ $section5['title'] }}</h1>
                    <p class="text-white py-3 d-none d-lg-block">{!! $section5['description'] !!}</p>
                    <div class="mt-4">
                        <img src="{{ asset('assets/img/home/kristall_logo.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

    @endif

    {{-- Photo Gallery --}}
    @if(isset($section6))
    <section class="photo-gallery py-lg-5">
        <div class="container py-5">
            <div class="text-title text-center pb-lg-5">
                <span>{{ $section6['top_title'] }}</span>
                <h1>{{ $section6['title'] }}</h1>
                <p>{{ $section6['description'] }}</p>
            </div>
            <div class="swiper gallerySwiper">
                <div class="swiper-wrapper">
                    @foreach($section6['images'] as $image)
                        <div class="swiper-slide">
                            <a href="{{ url($image['url']) }}" data-fancybox="gallery">
                                <img src="{{ url($image['url']) }}" alt="{{ $image['url'] }}" style="width:450px; height: 500px; max-height: 100%; max-width: 100%; object-fit: cover; margin:auto!important;">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-example-next position-absolute top-50 translate-middle-y text-white" style="z-index: 99; right: 20px;">
                    <a href="javascript:void(0)">
                        <i class="bi bi-arrow-right-circle-fill fs-2"></i>
                    </a>
                </div>
                <div class="swiper-example-prev position-absolute top-50 translate-middle-y text-white" style="z-index: 99; left: 20px;">
                    <a href="javascript:void(0)">
                        <i class="bi bi-arrow-left-circle-fill fs-2"></i>
                    </a>
                </div>
            </div>
            <div class="row pt-5 mt-5 d-flex justify-content-center">
                <a href="#" class="btn btnMain btn-outline-dark ms-md-3 my-3 my-lg-0 text-uppercase">Alles sehen</a>
            </div>
        </div>
    </section>
    @endif

    <x-section-founder-message/>

    <x-section-homepage-faq/>

    <x-section-reference/>
@endsection
