@extends('front.layout.master')

@section('content')
    <section class="about-us-hero">
        <img src="{{ asset('assets/img/about-us/about_us_header.png') }}" alt="" class="w-100">
    </section>

    <section class="about-us-info position-relative pt-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3">
                    <div class="info-nav">
                        <h3 class="pb-4">Kurumsal</h3>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach($section1['about-data'] as $key => $item)
                                <a class="text-capitalize nav-link {{ $loop->first ? 'active' : ''  }}" id="v-pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $key }}" type="button" role="tab" charset="UTF-8">{{ $item['title'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 py-4">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach($section1['about-data'] as $key => $item)
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="v-pills-{{ $key }}" role="tabpanel">
                            <span>{{ $item['top_title'] }}</span>
                            <h1 class="pb-sm-3">{{ $item['title'] }}</h1>
                            <p>{!! $item['description'] !!}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($section2)
    <section class="about-us-brothers py-5">
        <div class="container py-lg-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="img">
                        <img src="{{ $section2['image']['url'] }}" alt="{{ $section2['image']['name'] }}">
                    </div>
                </div>
                <div class="col-lg-5 pt-5 me-lg-5">
                    <div class="text-title pb-3">
                        <span>{{ $section2['top_title'] }}</span>
                        <h1>{{ $section2['title'] }}</h1>
                    </div>
                    <p>{!! $section2['description'] !!}</p>

                    <img src="{{ asset('assets/img/about-us/about_us_imza.png') }}" alt="">
                    <p class="mb-0 pb-0 pt-4  ">{{ $section2['top_title'] }}</p>
                    <span class="  fs-08 fw-light">KRON LEUCHTER FOUNDER</span>

                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="video-and-news py-lg-5">
        <div class="container py-5">
            <div class="text-title text-center pb-3">
                <span>bizden</span>
                <h1>Röportaj & Videolar</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum at culpa ratione!</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about-us/about_us_news_1.png') }}" alt="">
                    <p class="m-0 pt-3 fs-6 fw-bold">80CM DURCHMESSER</p>
                    <p class="m-0 p-0">We have a very large selection of chandeliers and trading exclusively with
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about-us/about_us_news_2.png') }}" alt="">
                    <p class="m-0 pt-3 fs-6 fw-bold">80CM DURCHMESSER</p>
                    <p class="m-0 p-0">We have a very large selection of chandeliers and trading exclusively with
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about-us/about_us_news_3.png') }}" alt="">
                    <p class="m-0 pt-3 fs-6 fw-bold">80CM DURCHMESSER</p>
                    <p class="m-0 p-0">We have a very large selection of chandeliers and trading exclusively with
                    </p>
                </div>
            </div>
        </div>
    </section>

    <x-section-reference/>
@endsection