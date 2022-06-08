@extends('front.layout.master')

@section('footer-center')
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.4-beta.33/jquery.inputmask.min.js"></script>
    <script src="{{ asset('assets/js/card.js') }}"></script>
    <script src="{{ asset('assets/js/flipper.min.js') }}"></script>
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

                    <div class="rounded-circle circle-seppet btn p-0 " style="border: 1px solid rgb(0, 0, 0);">
                        <i class="bi bi-check-lg "></i>
                    </div>
                </div>
            </div>

            <div class="row payment3-wrap flex-column">
                <div class="accordion show fade" id="accordionPrice">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="priceHeader">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#priceCollapse">
                                Banka / Kredi Kartı <span class="d-none d-lg-block">İstediğiniz banka veya kredi kartı ile ödemenizi anında yapın </span>
                            </button>
                        </h2>
                        <div id="priceCollapse" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row justify-content-center justify-content-lg-between align-items-center">
                                    <div class="col-lg-6 cardInfo order-2 order-lg-1">
                                        <form action="{{route('payment.post')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="cardInput">Kart numarası</label>
                                                    <input required name="card_number" class="input form-control" id="cardInput"
                                                           value="5400010000000004" placeholder="**** **** **** ***">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="cardHolder">Kart üzerindeki isim</label>
                                                    <input required name="fullname" class="form-control" id="cardHolder"
                                                           value="Furkan Beydemir" placeholder="Kart sahibi adı soyadı">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="form-group">
                                                        <label for="monthInput">S.K.T</label>
                                                        <select required name="month" class="form-control " id="monthInput">
                                                            <option class="disabled" readonly>Ay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="form-group">
                                                        <label for="yearInput"></label>
                                                        <select required name="year" class="form-control mt-1" id="yearInput">
                                                            <option class="disabled" readonly>Yıl</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="cwInput">Güvenlik K.</label>
                                                        <input required name="cvc" type="text" class="form-control" id="cwInput"
                                                               value="653" placeholder="CVV">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check pt-4">
                                                <input class="form-check-input" name="_3dsecure" type="checkbox" checked id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    3D Secure ile Ödeme
                                                </label>
                                                <a href="javascript:void(0);"><span class="text-primary ms-2">3D Nedir?</span></a>
                                            </div>
                                            <button type="submit" class="btn mainBtn mt-4">Ödeme Yap</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-5 order-1 order-lg-2 mb-4 mb-lg-0">
                                        <div class="m-auto">
                                            <div class="card willFlip" id="willFlip">
                                                <div class="front">
                                                    <div class="card_body">
                                                        <div class="d-flex justify-content-between">
                                                            <img src="{{ asset('assets/img/card_bank.png') }}" width="50" style="filter: contrast(0)" height="50" alt="">
                                                            <img src="{{ asset('assets/img/visa.png') }}" width="50" height="50" alt="">
                                                        </div>
                                                        <div class="col-12 my-2">
                                                            <div class="form-group">
                                                                <label for="cardNumber"></label>
                                                                <input type="text" class="form-control fs-3" disabled readonly id="cardNumber">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="col-6 card-holder-content">
                                                                <div class="form-group">
                                                                    <label for="cardHolderValue" class="fw-bold float-start">Card Holder</label>
                                                                    <input type="text" placeholder="FULL NAME" disabled class="cardHolder form-control" id="cardHolderValue">
                                                                </div>
                                                            </div>
                                                            <div class="col-4 input-date">
                                                                <label for="expiredMonth" class="text-end d-block fw-bold">Expires</label>
                                                                <div class="d-flex justify-content-end align-items-center">
                                                                    <div class="col-4">
                                                                        <input type="text" disabled class="cardHolder form-control" id="expiredMonth">
                                                                    </div>
                                                                    <div class="col"><h4>/</h4></div>
                                                                    <div class="col-4">
                                                                        <input type="text" disabled class="cardHolder form-control" id="expiredYear">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="back">
                                                    <div class="card-bar"></div>
                                                    <div class="card-body px-2">
                                                        <div class="col-md-12 back-middle">
                                                            <div class="form-group">
                                                                <label for="cardCcv" class="text-end d-block mb-1 fw-bold">CVV</label>
                                                                <input type="password" disabled class="form-control" id="cardCcv">
                                                            </div>
                                                            <img src="{{ asset('assets/img/visa.png') }}" class="float-right" width="50" height="50" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion show fade" id="accordionPayment1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paymentCollapse1">
                                Klarna <span class="d-none d-lg-block">Anında Havale seçeneğini kullanarak siparişinizi anında onaylatabilirsiniz. </span>
                            </button>
                        </h2>
                        <div id="paymentCollapse1" class="accordion-collapse collapse">
                            <div class="accordion-body">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion show fade" id="accordionPayment2">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paymentCollapse2">
                                Paypal <span class="d-none d-lg-block">Paylap ile siparisinizi anında tamamlayabilirsiniz. </span>
                            </button>
                        </h2>
                        <div id="paymentCollapse2" class="accordion-collapse collapse">
                            <div class="accordion-body">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection