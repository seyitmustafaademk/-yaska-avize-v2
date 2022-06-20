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
                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail-Addresse">
                                    <label for="email">E-Mail-Addresse*</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input required type="tel" name="contact_phone" id="contact_phone" class="form-control" placeholder="Telefon">
                                    <label for="contact_phone">Telefon*</label>
                                </div>
                                <h5 class="text-uppercase pt-4">Wo wollen Sie diese Ladung?</h5>
                                <div class="row pt-3">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input required type="text" name="first_name" class="form-control" id="first_name" placeholder="Vorname">
                                            <label for="first_name">Vorname*</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input required type="text" name="last_name" class="form-control" id="last_name" placeholder="Nachname">
                                            <label for="last_name">Nachname*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Unternehmensnahme (Optional)">
                                    <label for="company_name">Unternehmensnahme (Optional)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="text" name="street" class="form-control" id="street" placeholder="Adresse">
                                    <label for="street">Adresse*</label>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input required type="text" name="city" class="form-control" id="city" placeholder="Stadt*">
                                        <label for="city">Stadt*</label>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="text" name="state" class="form-control" id="state" placeholder="Staat / Provinz*">
                                    <label for="state">Staat / Provinz*</label>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Postleitzahl*">
                                            <label for="postal_code">Postleitzahl</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <select required class="form-select" name="country" id="country">
                                                <option value="germany" selected>Germany</option>
                                            </select>
                                            <label for="floatingSelect">Funktioniert mit Auswahl</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="text" name="phone" class="form-control" id="phone" placeholder="Telefon" required>
                                    <label for="phone">Telefon*</label>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
                <div class="col-xl-4 paymentSidebar pt-3">
                    <div class="paymentSidebar-inner theiaStickySidebar ">
                        <div class="paymentBar bg-white p-4 mb-4 rounded-3">
                            <h4 class="text-uppercase fw-bold">Zusammenfassung</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-uppercase">Zwischensumme</small>
                                <span class="fs-3 fw-500">{{ number_format($price, 2, ',', '.') }}€</span>

                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="fs-4 text-uppercase">Gesamt</small>
                                <span class="fs-2 fw-500">{{ number_format($paid_price, 2, ',', '.') }}€</span>
                            </div>
                            <button type="submit" form="unique-form" class="btn mainBtn w-100">Mach weiter</button>
                            <hr style="height: 3px; border-radius: 10%;">
                            <div class="pt-4">
                                <small>1-2 Tage ab Versandtag
                                    Die Versandoptionen werden während des Bestellvorgangs aktualisiert.</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection