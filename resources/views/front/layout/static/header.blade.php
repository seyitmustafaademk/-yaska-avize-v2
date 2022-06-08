<header class="py-3 mb-5 navbar-light bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler border-0 text-dark ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                    <span class="bi bi-list fs-1 border-0"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav position-relative text-center text-lg-start">
                        <a class="nav-link text-dark {{  Route::currentRouteName() == 'front.homepage' ? 'active': '' }} ms-lg-4" aria-current="page" href="{{ route('front.homepage') }}">Startseite</a>
                        <a class="nav-link text-dark {{  Route::currentRouteName() == 'front.about-us' ? 'active': '' }} ms-lg-4" href="{{ route('front.about-us') }}">Über uns</a>
                        <a class="nav-link text-dark {{  Route::currentRouteName() == 'front.shop' ? 'active': '' }} ms-lg-4" href="{{ route('front.shop') }}">Produkte</a>
                        <a href="{{ route('front.homepage') }}" class="nav-link nav-logo ms-lg-4 d-none d-lg-block">
                            <img src="{{ asset('assets/img/logo/logo2.svg') }}" alt="" width="50" style="margin-top: -10px;">
                        </a>
                        <a class="nav-link text-dark {{  Route::currentRouteName() == 'front.special' ? 'active': '' }} ms-lg-4" href="{{ route('front.special') }}">Services</a>
                        <a class="nav-link text-dark {{  Route::currentRouteName() == 'front.blog' ? 'active': '' }} ms-lg-4" href="{{ route('front.blog') }}">Stories</a>
                        <a class="nav-link text-dark {{  Route::currentRouteName() == 'front.contact' ? 'active': '' }} ms-lg-4" href="{{ route('front.contact') }}">Kontakt</a>
                        <div class="d-flex justify-content-evenly align-items-center d-lg-none">
                            <a class="nav-link text-dark"><i class="bi bi-cart"></i></a>
                        </div>
                        <div class="d-flex d-none d-lg-flex ms-lg-5">
                            <div class="">
                                <a class="position-relative openCart nav-link text-dark fs-6 py-0 mt-1">
                                    <i class="bi fs-5 bi-cart"></i>
                                    <span class="nav-item position-absolute fs-07 top-0 start-100 translate-middle badge rounded-circle dynamicCartCount" style="background-color: #d4b068;">
                                        0
                                    </span>
                                </a>
                            </div>
                            <div class="position-relative order-1 order-xl-5 sepetim">
                                <div class="position-absolute mt-4 py-3 sepetmain shadow-lg d-none px-3 bg-light top-100">
                                    <div class="sepetimt position-relative mb-3">
                                        <span class="pt-4">Overview</span>
                                        <span class="position-absolute pointer top-0 start-100 translate-middle sepet-iclose-icon">X</span>
                                    </div>
                                    <div class="sepp-add-item">

                                    </div>
                                    <div class="pt-4 d-flex justify-content-between">
                                        <a href="{{ route('front.shop') }}" class="btn btn-sm"> Sepete Ürün Ekle</a>
                                        <a href="{{ route('front.payment.first-step') }}" id="sepete-git" class="btn" style="background-color: #d4b068!important; border-radius: 20px!important; color: white!important;">Check Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="nav-link text-dark pt-4 d-lg-none">
                            <img src="{{ asset('assets/img/log-01.svg') }}" alt="" width="50">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
