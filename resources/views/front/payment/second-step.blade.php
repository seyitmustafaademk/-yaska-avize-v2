@extends('front.layout.master')

@section('footer-center')
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.min.js') }}"></script>
@endsection
@section('footer-bottom')
    <script>
        jQuery(document).ready(function () {
            jQuery('.paymentSidebar').theiaStickySidebar({
                additionalMarginTop: 130,
                minWidth: 991,
            });
        });
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
                    <div class="rounded-circle circle-seppet text-white dark-blue">
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
                        <div class="payment-second-wrap">
                            <h5>CONTACT</h5>
                            <form id="unique-form" action="{{ route('front.payment.third-step') }}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                    <label for="email">Email address*</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input required type="tel" name="contact_phone" id="contact_phone" class="form-control" placeholder="Email address">
                                    <label for="contact_phone">Phone*</label>
                                </div>
                                <h5 class="text-uppercase pt-4">Where Do you want this cargo?</h5>
                                <div class="row pt-3">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input required type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
                                            <label for="first_name">First Name*</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input required type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
                                            <label for="last_name">Last Name*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company name(optional)">
                                    <label for="company_name">Company name(optional)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="text" name="street" class="form-control" id="street" placeholder="Street Address">
                                    <label for="street">Street Address*</label>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input required type="text" name="city" class="form-control" id="city" placeholder="City*">
                                        <label for="city">City*</label>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="text" name="state" class="form-control" id="state" placeholder="State / Provice*">
                                    <label for="state">State / Provice*</label>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Postal Code*">
                                            <label for="postal_code">Postal Code</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <select required class="form-select" name="country" id="country">
                                                <option value="germany" selected>Germany</option>
                                            </select>
                                            <label for="floatingSelect">Works with selects</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
                                    <label for="phone">Phone*</label>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
                <div class="col-xl-4 paymentSidebar pt-3">
                    <div class="paymentSidebar-inner theiaStickySidebar ">
                        <div class="paymentBar bg-white p-4 mb-4 rounded-3">
                            <h4 class="text-uppercase fw-bold">Summary</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-uppercase">Subtotal</small>
                                <span class="fs-3 fw-500">{{ number_format($price, 2, ',', '.') }}€</span>

                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="fs-4 text-uppercase">Total</small>
                                <span class="fs-2 fw-500">{{ number_format($paid_price, 2, ',', '.') }}€</span>
                            </div>
                            <button type="submit" form="unique-form" class="btn mainBtn w-100">Devam Et</button>
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