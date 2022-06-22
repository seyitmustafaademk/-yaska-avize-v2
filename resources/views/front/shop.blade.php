@extends('front.layout.master')
@section('footer-center')
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
@endsection
@section('footer-bottom')
    <script>
        if ($(".shop-wrapper")) {
            var $filter = $('.filter-content').isotope({});
            $('.filter-menu').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $filter.isotope({
                    filter: filterValue
                });
            });

            if ($(".shop-item-inner i").click(function (e) {
                $(this).toggleClass("text-danger");
            }));
        }
    </script>
@endsection


@section('content')
    <section class="shop-wrapper pt-5 mt-5">
        <div class="container">
            <div class="row justify-content-between align-items-center mb-md-5">
                <h3 class="d-inline-block d-md-none text-center mb-4 fw-500">{{ ($category == 'Modern' || $category == 'Antiquität') ? $category . ' Kronleuchter' : $category }}</h3>
                <div class="shop-btn-all filter-menu d-flex  flex-wrap flex-md-nowrap align-items-center">
                    <h3 class="d-none d-md-inline-block me-4 fw-500">{{ ($category == 'Modern' || $category == 'Antiquität') ? $category . ' Kronleuchter' : $category }}</h3>
                </div>
            </div>
            <div class="row">
                @if(!empty($products))
                    @foreach($products as $product)
                        @php
                            $url = null;
                                $images = json_decode($product->product_images, TRUE)[0]['url'];
                                $image_name = json_decode($product->product_images, TRUE)[0]['name'];
                        @endphp
                        <div class="col-6 col-md-4 col-lg-3 py-3">
                            <div class="shop-item-inner" style="max-height: 400px; height: 400px; overflow: hidden;">
                                <a href="{{ route('front.product-detail', $product->slug) }}" >
                                    <img src="{{ url($images) }}" alt="{{ $product->product_name }}" >
                                    <p>{{ $product->product_name }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>In dieser Kategorie gibt es keine Produkte!</p>
                @endif
            </div>
        </div>
    </section>

    <section class="quality bg-white mt-5">
        <div class="container py-5">
            <div class="text-title pb-3">
                <span>{{ $content['top_title'] }}</span>
                <h1>{{ $content['title'] }}</h1>
            </div>
            <div>
                {!! $content['description'] !!}
            </div>
        </div>
    </section>
@endsection
