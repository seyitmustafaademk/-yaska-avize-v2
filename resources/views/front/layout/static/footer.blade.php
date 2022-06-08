<footer class="position-relative overflow-hidden">
    <div class="footer-wrapper">
        <div style="background: #f2f2f2;">
            <div class="container">
                <div class="info-new-wrapper py-5">
                    <div
                        class="row justify-content-center justify-content-xl-between text-center text-xl-start align-items-center">
                        <div class="col-xl-3 pb-5 pb-xl-0">
                            <img src="{{ asset('assets/img/logo/krst-01.svg') }}" style="height: 100px!important;">
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 pb-3 pb-xl-0"  style="display: flex; align-items: center">
                            <i class="bi bi-clock display-6" style="color: #d4b068; font-weight: bold;"></i>
                            <span class="d-block d-lg-inline pt-3 pt-lg-0  ms-lg-2 fw-bold">MO-SA 13:00 - 18:00</span>
                        </div>
                        {{--
                        <div>
                            <img src="img/phone-icon2.png" alt="">
                            <a href="tel:491732372411"><span class="d-inline ms-2 fw-bold fs-09">+49 173 2372 411</span></a>

                        </div>
                        --}}
                        <div class="col-6 col-md-4 col-xl-3 pb-3 pb-xl-0"  style="display: flex; align-items: center">
                            <i class="bi bi-envelope display-6" style="color: #d4b068; font-weight: bold"></i>
                            <a href="mailto:info@kristallkultur.com">
                                <span class="d-block d-lg-inline pt-3 pt-lg-0  ms-lg-2 fw-bold fs-09 text-uppercase">info@kristallkultur.com</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 pb-3 pb-xl-0"  style="display: flex; align-items: center">
                            <i class="bi bi-telephone display-6" style="color: #d4b068; font-weight: bold"></i>
                            <a href="{{ route('front.contact') }}">
                                <span class="d-block d-lg-inline pt-3 pt-lg-0 ms-lg-2 fw-bold fs-09">KONTAKTFORMULAR </span>
                            </a>
                        </div>
                        {{--
                        <div>
                            <div class="d-flex justify-content-center justify-content-md-start gap-3 py-4">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>

        </div>

        {{--
        <div class="info-wrapper text-center">
            <h3 class="pb-4 text-white d-none d-lg-block">TAPPEN SIE IM DUNKELNT? +49 173 2372 411</h3>
            <h2 class="pb-4 text-white d-lg-none">TAPPEN SIE IM DUNKELNT?<a href="https://wa.me/491732372411" class="d-block pt-3" style="color: #d4b068;">+49 173 2372 411</a></h2>
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-4">
                    <img src="img/earth-icon2.png" alt="">
                    <p>MO-SA 13:00 - 18:00</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <img src="img/comment-icon2.png" alt="">
                    <p>info@kristallkultur.com</p>
                </div>
                <div class="col-lg-4">
                    <img src="img/click-icon2.png" alt="">
                    <p>KONTAKTFORMULAR</p>
                </div>
            </div>
        </div>
        --}}
        <div class="container">
            <div class="bottom-wrapper py-5">

                {{-- TODO : Bu bölümün linkleri en son atanacak  --}}
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-6 col-md-4 col-xl-3 footerItem pt-3 pt-xl-0">
                        <h3 class="footer-title">Rechtliches</h3>
                        <ul>
                            <li><a href="#">Datenschutzerklärung</a></li>
                            <li><a href="#">Impressum</a></li>
                            <li><a href="#">Widerrufsbelehrung</a></li>
                            <li><a href="#">Cookies</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 footerItem pt-3 pt-xl-0">
                        <h3 class="footer-title">Informationen</h3>
                        <ul>
                            <li><a href="{{ route('front.homepage') }}">Startseite</a></li>
                            <li><a href="{{ route('front.about-us') }}">Über uns</a></li>
                            <li><a href="{{ route('front.special') }}">Dienstleistungen</a></li>
                            <li><a href="{{ route('front.shop') }}">Shop</a></li>
                            <li><a href="{{ route('front.blog') }}">Stories</a></li>
                            <li><a href="{{ route('front.contact') }}">Kontakt</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 footerItem pt-3 pt-xl-0">
                        <h3 class="footer-title">SHOP</h3>
                        <ul>
                            <li><a href="{{ route('front.shop') }}">ANTIKA <span class="fw-light">Kronleuchter</span></a></li>
                            <li><a href="{{ route('front.shop') }}">Neue <span class="fw-lighter">Kronleuchter</span></a></li>
                            <li><a href="{{ route('front.shop') }}">Grosse <span class="fw-light">Kronleuchter</span></a></li>
                            <li><a href="{{ route('front.shop') }}">Ersatzteile </a></li>
                            <li><a href="{{ route('front.shop') }}">Wandlampen</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-12 col-xl-3 footerItem pt-3 pt-xl-0">
                        <h3 class="footer-title">Kontakt</h3>
                        <ul>
                            <li>
                                <a href="https://goo.gl/maps/5qsLZc7J9dg9yH9HA">
                                    Kristall Kurtur <br>
                                    GitschinerStr. 96<br>
                                    10969 Berlin<br>
                                    Deutschland <br>
                                </a>
                            </li>
                            <li><a href="tel:493034766749">+4930 347 66 749</a></li>
                            <li><a href="mailto:Info@kristallkultur.com">info@kristallkultur.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom text-center">
        © 2021 - <span>KRONLEUCHTER.</span> ALL RIGHTS RESERVED
    </div>
    <div class="contact-info-fixed-button">
        <div class="fixed-item" style="background-color: #d4b068;"><a style="background-color: #d4b068;" href="https://wa.me/+491775652848"><i class="bi bi-whatsapp"></i></a></div>
        <div class="fixed-item" style="background-color: #d4b068;"><a style="background-color: #d4b068;" href="tel:±4930 347 66 749"><i class="bi bi-telephone"></i></a></div>
        <div class="fixed-item" style="background-color: #d4b068;"><a style="background-color: #d4b068;" href="https://goo.gl/maps/5qsLZc7J9dg9yH9HA"><i class="bi bi-map"></i></a></div>
    </div>
</footer>
