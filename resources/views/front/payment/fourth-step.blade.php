@extends('front.layout.master')

@section('footer-center')
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.min.js') }}"></script>
@endsection

@section('content')
    <section class="payment-wrapper">
        <div class="container">
            <div class="text-center text-lg-end mt-5 pt-5">
                <div class="shop-bar py-3 d-flex justify-content-center justify-content-lg-end align-items-center">
                    <div class="rounded-circle circle-seppet text-white dark-blue">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="line-seppet"></div>

                    <div class="rounded-circle circle-seppet text-white dark-blue">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="line-seppet"> </div>

                    <div class="rounded-circle circle-seppet text-white dark-blue">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="line-seppet"> </div>

                    <div class="rounded-circle circle-seppet text-white dark-blue">
                        <i class="bi bi-check-lg "></i>
                    </div>
                </div>
            </div>

            <div class="row payment4-wrap flex-column">
                <div class="col-12 shadow p-5 mt-5">
                    <div class="row justify-content-between align-items-center">

                        @if($error)
                            <div class="col-lg-6">
                                <h1 class="text-uppercase fw-bolder display-4 pb-4">Ödeme Başarısız!
                                    <span class="d-inline display-2">
                                        <i class="bi bi-x-lg" style="color: red;"></i>
                                    </span>
                                </h1>
                                <p class="lh-2">{{ $error_message }}</p>
                            </div>
                        @else
                            @if($fraud_status == 1)
                                <div class="col-lg-6">
                                    <h1 class="text-uppercase fw-bolder display-4 pb-4">Glückwunsch! <span class="d-inline display-2"><i class="bi bi-check-lg" style="color: green;"></i></span></h1>
                                    <p class="lh-2">Ödeme işlemi başarıyla tamamlandı.
                                        <a href="#" class="text-primary"> #{{ $conversation_id }}</a><br> Sipariş numarası ile siparişinizi takip edebilirsiniz.</p>
                                </div>
                            @endif
                            @if($fraud_status == 0)
                                <div class="col-lg-6">
                                    <h1 class="text-uppercase fw-bolder display-4 pb-4">Glückwunsch! <span class="d-inline display-2"><i class="bi bi-check-lg" style="color: green;"></i></span></h1>
                                    <p class="lh-2">Ödeme işlemi başarıyla tamamlandı fakat işlem Iyzico ödeme oany sürecinde.
                                        Onay geldiğinde siparişiniz otomatik olarak tamamlanacaktır.
                                        <a href="#" class="text-primary"> #{{ $conversation_id }} </a><br> Sipariş numarası ile siparişinizi takip edebilirsiniz.</p>
                                    {{-- TODO : Sipariş numarası kontrol etme linki yapılabilir --}}

                                    {{-- TODO : Sipariş numarası eklenecek --}}
                                </div>
                            @endif

                            <div class="col-lg-5">
                                <table class="table">
                                    <tr>
                                        <td>Zwischensumme</td>
                                        <td>{{ number_format($price, 2, ',', '.') }}€</td>
                                    </tr>
                                    <tr>
                                        <td>MwSt. + Cargo </td>
                                        <td>{{ number_format($paid_price - $price, 2, ',', '.') }}€</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Gesamtsumme</td>
                                        <td class="fw-bolder">{{ number_format($paid_price, 2, ',', '.') }}€</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Kredit Karte <span class="d-block m-0 text-muted fs-08">Visa, Mastercard, AMEX</span></td>
                                        <td><img src="{{ asset('assets/img/payment-method.png') }}" alt="" class="img-fluid"></td>
                                    </tr>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection