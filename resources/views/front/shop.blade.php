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
                <h3 class="d-inline-block d-md-none text-center mb-4 fw-500">{{ $category }}</h3>
                <div class="shop-btn-all filter-menu d-flex  flex-wrap flex-md-nowrap align-items-center">
                    <h3 class="d-none d-md-inline-block me-4 fw-500">{{ $category }}</h3>
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
                <span>sizden gelen</span>
                <h1>Kaliteli Avizenin Adresi</h1>
            </div>
            <p>
                Für viele Liebhaber schneller Motoren oder leistungsstarker Nutzfahrzeuge ist es ein spannendes
                Hobby, Auto- und Verkehrsmodelle im Miniformat wie 1:18, 1:43 oder 1:87 zu sammeln (z.B. von Red
                Bull Racing). Der Klassiker dabei ist natürlich Matchbox, der Siku control, WIKING Modelle sowie
                Espewe Modelle. Schnelle Flitzer wie bekannte Rennfahrzeuge von etablierten Automarken (wie z.B.
                Porsche Targa oder den Porsche 993 Turbo) gibt es dabei nicht nur von den jeweiligen Herstellern
                oder von auf Modellautos spezialisierten Marken zu kaufen. Auch private Anbieter veräußern Stücke
                aus ihren Vitrinen, sodass auch Auto- oder natürlich auch Lkw- oder Bus-Miniaturen mit hohem
                Sammlerwert zu entdecken sind.
            </p>
            <p>
                Für viele Liebhaber schneller Motoren oder leistungsstarker Nutzfahrzeuge ist es ein spannendes
                Hobby, Auto- und Verkehrsmodelle im Miniformat wie 1:18, 1:43 oder 1:87 zu sammeln (z.B. von Red
                Bull Racing). Der Klassiker dabei ist natürlich Matchbox, der Siku control, WIKING Modelle sowie
                Espewe Modelle. Schnelle Flitzer wie bekannte Rennfahrzeuge von etablierten Automarken (wie z.B.
                Porsche Targa oder den Porsche 993 Turbo) gibt es dabei nicht nur von den jeweiligen Herstellern
                oder von auf Modellautos spezialisierten Marken zu kaufen. Auch private Anbieter veräußern Stücke
                aus ihren Vitrinen, sodass auch Auto- oder natürlich auch Lkw- oder Bus-Miniaturen mit hohem
                Sammlerwert zu entdecken sind.
            </p>
            <p>
                Nutzfahrzeuge im kleinen Format
            </p>
            <p>
                Für viele Liebhaber schneller Motoren oder leistungsstarker Nutzfahrzeuge ist es ein spannendes
                Hobby, Auto- und Verkehrsmodelle im Miniformat wie 1:18, 1:43 oder 1:87 zu sammeln (z.B. von Red
                Bull Racing). Der Klassiker dabei ist natürlich Matchbox, der Siku control, WIKING Modelle sowie
                Espewe Modelle. Schnelle Flitzer wie bekannte Rennfahrzeuge von etablierten Automarken (wie z.B.
                Porsche Targa oder den Porsche 993 Turbo) gibt es dabei nicht nur von den jeweiligen Herstellern
                oder von auf Modellautos spezialisierten Marken zu kaufen. Auch private Anbieter veräußern Stücke
                aus ihren Vitrinen, sodass auch Auto- oder natürlich auch Lkw- oder Bus-Miniaturen mit hohem
                Sammlerwert zu entdecken sind.
            </p>
        </div>
    </section>
@endsection
