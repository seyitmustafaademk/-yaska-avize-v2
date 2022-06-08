@extends('front.layout.master')

@section('footer-center')
<script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/resize-sensor@0.0.6/ResizeSensor.min.js" integrity="sha256-YxaCtjdmnKYlDOAoZZXhrP9FY3tJyzWhdFn8C1zlWYk=" crossorigin="anonymous"></script>
@endsection
@section('footer-bottom')
<script>
    jQuery(document).ready(function() {
        jQuery('.paymentSidebar').theiaStickySidebar({
            additionalMarginTop: 130,
            minWidth: 991,
        });
    });
</script>
<script>
    function GenerateItem(img_src, title, price, qty) {
        return `<div class="payment-item py-3" data-pdid="`
        `">
                        <div class="d-flex align-items-center item-wrapper p-md-2">
                            <i class="bi bi-x-circle fs-3"></i>
                            <div class="d-flex align-items-center ms-1 ms-sm-4">
                                <img src="` + img_src + `" alt="` + title + `">
                                <div class="ms-sm-5">
                                    <h6 class="m-0 p-0">` + title + `</h6>
                                    <p class="fs-1 m-0 fw-500 paymentPrice">` + price + `€</p>
                                </div>
                            </div>
                            <div class="text-center ms-auto me-3 fs-4">
                                <i class="bi bi-plus-circle paymentAddPrice"></i>
                                <span class="d-block">` + qty + `</span>
                                <i class="bi bi-dash-circle paymentRemovePrice"></i>
                            </div>
                        </div>
                    </div>`;
    }

    var cart = JSON.parse(Cookies.get('cart'));
    for (let i = 0; i < cart.length; i++) {
        GenerateItem('http://kron-leuchter.com/assets/img/home/av1.png', cart[i].title, cart[i].price, cart[i].qty);
    }
    console.log(cart);
</script>
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

                <div class="rounded-circle circle-seppet" style="border: 1px solid rgb(0, 0, 0);">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="line-seppet"> </div>

                <div class="rounded-circle circle-seppet btn p-0 " style="border: 1px solid rgb(0, 0, 0);">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="line-seppet"> </div>

                <div class="rounded-circle circle-seppet btn p-0 " style="border: 1px solid rgb(0, 0, 0);">
                    <i class="bi bi-check-lg "></i>
                </div>
            </div>
        </div>
        <div class="row justify-content-between p-3 p-md-0">
            <div class="col-xl-7">
                <div class="row flex-column">
                    @if($cart != null)
                    @php
                    $total_price = 0;
                    @endphp
                    @foreach($cart as $item)
                    @php
                    $total_price += (intval($item['count']) * intval($item['packet']->pd_list_price));
                    @endphp
                    <div class="payment-item py-3">
                        <div class="d-flex align-items-center item-wrapper p-md-2">
                            <a href="{{ route('cart.delete-item', $item['packet']->pd_id) }}" class="bi bi-x-circle fs-3"></a>
                            <div class="d-flex align-items-center ms-1 ms-sm-4">
                                <img src="{{ asset('assets/img/home/av1.png') }}" alt="{{ $item['packet']->p_title }}">
                                <div class="ms-sm-5">
                                    <h6 class="m-0 p-0">{{ $item['packet']->p_title }}</h6>
                                    <p class="fs-1 m-0 fw-500 paymentPrice">
                                        {{ intval($item['count']) * intval($item['packet']->pd_list_price) }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-center ms-auto me-3 fs-4">
                                <a href="{{ route('cart.set-cart', $item['packet']->pd_id) }}" class="bi bi-plus-circle paymentAddPrice"></a>
                                <span class="d-block">{{ $item['count'] }}</span>
                                <a href="{{ route('cart.decrease-item', $item['packet']->pd_id) }}" class="bi bi-dash-circle paymentRemovePrice"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-xl-4 paymentSidebar pt-3">
                <div class="paymentSidebar-inner theiaStickySidebar ">
                    <div class="paymentBar bg-white p-4 mb-4 rounded-3">
                        <h4 class="text-uppercase fw-bold">Summary</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-uppercase">Subtotal</small>
                            <span class="fs-3 fw-500">{{ $price }}€</span>

                        </div>
                        <div class="d-flex justify-content-between align-items-center" id="cargo_short_text">
                            <small class="text-uppercase">Cargo</small>
                            <span class="fs-3 fw-500">{{ $item['packet']->p_cargo_price }}€</span>

                        </div>


                        <div class="d-flex justify-content-between align-items-center">
                            <small class="fs-4 text-uppercase">Total</small>
                            <input type="hidden" id="kargo_dahil" value="{{ $paid_price + $item['packet']->p_cargo_price }}">
                            <input type="hidden" id="kargo_haric" value="{{ $paid_price }}">
                            <span class="fs-2 fw-500" id="">
                                <div style="float: left;" id="price_text">{{ $paid_price + $item['packet']->p_cargo_price }}</div> €
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-uppercase">
                                Kargo istemiyorum <input type="checkbox" id="cargo_istemiyorum" onchange="cargo()">
                            </small>

                        </div>
                        <a href="{{ route('front.payment.second-step') }}" class="btn mainBtn w-100">Satın Al</a>
                        <hr style="height: 3px; border-radius: 10%;">
                        <div class="pt-4">
                            <small>1-2 day from the day ship
                                Shipping options will be updated during checkout.</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    function cargo() {
        var checkBox = document.getElementById("cargo_istemiyorum");
        var kargo_dahil = document.getElementById("kargo_dahil").value;
        var kargo_haric = document.getElementById("kargo_haric").value;
        if (checkBox.checked == true) {
            document.getElementById("price_text").innerHTML = kargo_haric;
            document.getElementById("cargo_short_text").innerHTML = "";

        } else {
            document.getElementById("price_text").innerHTML = kargo_dahil;
            document.getElementById("cargo_short_text").innerHTML = '<small class="text-uppercase">Cargo</small><span class="fs-3 fw-500"><?php echo $item['packet']->p_cargo_price ?>€</span>';

        }
    }
</script>