@extends('front.layout.master')

@section('head-bottom')
    <style>
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .productHeroBottom .swiper-slide {
            opacity: .4;
        }

        .swiper-slide-thumb-active {
            opacity: 1;
        }
    </style>
@endsection

@section('content')

    <section class="product-detail-hero">
        <div class="container-fluid gx-0 overflow-hidden">
            <div class="row justify-content-center justify-content-xl-between align-items-center">
                <div class="col-xl-5 position-relative bg-white py-lg-5 text-center bg-light">
                    <div class="productHero position-relative">
                        <!-- ### Swiper Hero Top ### -->

                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper swiper-productHeroTop">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide item-productHeroTop">
                                    <img src="#" class="mini_hero_0"/>
                                </div>

                                @php
                                    $images = json_decode($products->images, TRUE);
                                @endphp
                                @foreach($images as $image)
                                    <div class="swiper-slide item-productHeroTop">
                                        <img src="/{{ $image['url'] }}"/>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper swiper-productHeroBottom">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide item-productHeroBottom">
                                    <img src="#" class="mini_hero_0"/>
                                </div>
                                @foreach($images as $image)
                                    <div class="swiper-slide item-productHeroBottom">
                                        <img src="/{{ $image['url'] }}"/>
                                    </div>
                                @endforeach

                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-xl-6 py-lg-5">
                    <div class="product-detail-title text-center text-xl-start">
                        <a href="#" onclick="window.history.go(-1); return false;" class="fs-5 fw-bold text-dark">
                            <i class="bi bi-arrow-left me-2"></i> {{ $products->category }}
                        </a>
                        <div class="d-flex justify-content-center justify-content-xl-start align-items-center">
                            <h1 class="display-3 fw-bolder text-dark">{{ $products->title }}</h1>
                        </div>
                    </div>

                    <div class="product-detail-inner py-3 px-2 px-lg-0 text-center text-xl-start">
                        <div class="product-detail-table-info row align-items-baseline justify-content-center justify-content-xl-start">
                            <div class="product-detail-style col-md-3">
                                <span class="fw-bold d-block text-uppercase diameter-text">Ürün Çapı</span>
                                <ul class="nav nav-pills mt-2 mb-3 justify-content-center justify-content-xl-start" id="pills-tab" role="tablist">
                                    @php
                                        $diameter_ids = array_filter(explode(',', $products->pd_id));
                                        $diameters = array_filter(explode(',', $products->diameter));
                                    @endphp
                                    @for($i=0; $i< count($diameter_ids); $i++)
                                        <li class="nav-item" role="presentation">
                                            <button data-id="{{ $diameter_ids[$i] }}" data-p_id="{{ $products->id }}"
                                                    class="nav-link active  diameter-btn" id="pills-{{ $diameter_ids[$i] }}-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-{{ $diameter_ids[$i] }}" type="button" role="tab">{{ $diameters[$i] }}</button>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="tab-content col-xl-6" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-" role="tabpanel">
                                    <span class="border-0 diameter-text text-uppercase fw-bold">Teknik Özellikler</span>
                                    <table class="table table-striped table-responsive mt-2 text-start">
                                        <tbody>
                                            <tr>
                                                <td>Artikelnummer</td>
                                                <td>{{ $products->item_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Farbe </td>
                                                <td>{{ $products->color }}</td>
                                            </tr>
                                            <tr>
                                                <td>Fassung  </td>
                                                <td>{{ $products->product_version }}</td>
                                            </tr>
                                            <tr>
                                                <td>Leuchtmittel </td>
                                                <td>{{ $products->bulbs }}</td>
                                            </tr>

                                            <tr>
                                                <td>Hergestellt </td>
                                                <td>{{ $products->date_of_manufacture }}</td>
                                            </tr>
                                            <tr>
                                                <td>Material </td>
                                                <td>{{ $products->materials }}</td>
                                            </tr>
                                            <tr>
                                                <td>Höhe ohne Kette (in cm)</td>
                                                <td id="height-value">############</td>
                                            </tr>
                                            <tr>
                                                <td>Durchmesser (in cm)</td>
                                                <td id="diameter-value">############</td>
                                            </tr>
                                            <tr>
                                                <td>Gewicht in KG</td>
                                                <td id="weight-value">############</td>
                                            </tr>
                                            <tr>
                                                <td>Speditionslieferung </td>
                                                <td>{{ $products->cargo_time }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex justify-content-center justify-content-xl-start price-status pt-md-5 my-3">
                            <div class="pricing">
                                <span class="display-3 fw-bold priceSpan"></span>
                                <span class="display-3 fw-bold">€</span>
                            </div>
                            <div class="d-flex justify-content-center justify-content-md-start align-items-center mx-md-4 ps-md-4 pt-3 pt-lg-0">
                                <div id="stock-color" style="background-color: #3bf27b; width: 35px; height: 35px; line-height: 1.5; border-radius: 50%;"></div>
                                <span class="text-uppercase diameter-text ps-2 fw-bold" id="stock-text">verfügbar</span>
                            </div>
                        </div>
                        <p class="fs-09 diameter-text">Differenzbe•euertgem. €{{ $products->cargo_price }} USCG zzgl. <a href="#" class="ps-3 text-decoration-underline text-dark">Versand</a> <br>
                            Sofort verfOgloar, Lieferzeit {{ $products->cargo_time  }} Tage
                        </p>

                        <div>
                            <a class="btn btnPricing text-uppercase cart-btn pointer"><i class="bi bi-basket2-fill pe-2"></i>add to card</a>
                            <a href="https://wa.me/+491775652848" class="btn btnCustomer btn-outline-dark text-uppercase ms-lg-3 mt-3 mt-lg-0"><i class="bi bi-send pe-2"></i> saticiya sor</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    @isset($products->desc_title)
        <section class="py-5">
            <div class="container text-center">
                <h1 class="display-3 fw-bold text-uppercase">{{ $products->desc_title }}</h1>
                <p>{{ $products->description }}</p>
            </div>
        </section>
    @endisset

    <x-section-services-intro/>

    <x-section-services-shipping/>

    <x-section-founder-message/>

    <x-section-homepage-faq/>

    <x-section-reference/>
@endsection



@section('footer-bottom')
    {{-- Get Diameter Detail --}}
    <script>
        $(document).ready(function (){
            var main_image = $('.hero-image');
            $('.mini_hero1').click(function (){
                main_image.attr('src', $(this).attr('src'));
                main_image.attr('alt', $(this).attr('alt'));
            });
            $(".diameter-btn").click(function( event ) {
                event.preventDefault();
                var diameter_btn = event.target;
                var pdid = diameter_btn.dataset.id;
                var pid = diameter_btn.dataset.p_id;
                var cart_btn = $('.cart-btn');

                cart_btn.data('p_id', pid);
                cart_btn.data('pd_id', pdid);
                // console.log(cart_btn.data('p_id'))
                // console.log(cart_btn.data('pd_id'))

                $.ajax({
                    url: '/product-detail/' + pid + '/' + pdid,
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                    success: function (response){
                        $('.priceSpan').text(response.list_price);
                        $('.kdvSpan').text('+ Mwst. ' + (response.list_price * 0.19).toFixed(2) );
                        $('#total-price-value').text((response.list_price * 1.19).toFixed(2) + ' €');
                        $('#height-value').text(response.height);
                        $('#weight-value').text(response.weight);
                        $('#diameter-value').text(response.diameter);


                        if(response.stock === 1){
                            $('#stock-text').text('Verfügbar');
                            $('#stock-color').css('background-color', 'green');
                        } else if(response.stock === 0){
                            $('#stock-text').text('Lieferzeit 6 Wochen');
                            $('#stock-color').css('background-color', 'orange');
                        } else{
                            $('#stock-text').text('Verkauft');
                            $('#stock-color').css('background-color', 'red');
                        }


                        var image_wrapper = $('.mini_hero_0');
                        var image = JSON.parse(response.primary_image);
                        image_wrapper.attr('src', '/' + image.url);
                        image_wrapper.attr('alt', name);
                        main_image.attr('src',  '/' + image.url);
                        main_image.attr('alt', name);
                        image_wrapper.removeClass('d-none');
                        //console.log(image)
                    },
                    error: function (response){
                        console.log(response);
                    }
                });
            });
            $(".diameter-btn")[0].click();

            var cart_btn = $('.cart-btn');
            var p_id = cart_btn.data('p_id');
            var pd_id = cart_btn.data('pd_id');

            cart_btn.attr('href', ("{{ route('cart.set-cart')}}/" + pd_id));
        });
    </script>
@endsection

@section('footer-center')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection