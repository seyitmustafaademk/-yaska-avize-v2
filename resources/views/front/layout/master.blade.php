<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
    <title>{{ $__title }}</title>

    {{-- CSS only --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    @yield('head-center')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('head-bottom')
</head>

<body class="position-relative">

@include('front.layout.static.header')

<main style="margin-top: 85px">
    @yield('content')
</main>

@include('front.layout.static.footer')

{{-- JavaScript Bundle with Popper --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js" integrity="sha256-0H3Nuz3aug3afVbUlsu12Puxva3CP4EhJtPExqs54Vg=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@yield('footer-center')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@yield('footer-bottom')


<div id="custom-cookie-wrapper" class="cookie-wrapper position-fixed bottom-0 shadow bg-white w-100 d-none" style="z-index: 9999">
    <div class="cookie-container container py-3">
        <div class="cookie-content d-flex flex-wrap justify-content-evenly align-items-center text-center text-lg-start">
            <div class="cookie-text">
                <p>
                    Diese Website verwendet Cookies, um sicherzustellen, dass Sie die beste Erfahrung auf unserer Website erhalten.
                </p>
                <p>
                    Indem Sie diese Website weiterhin nutzen, akzeptieren Sie unsere Verwendung von Cookies.
                </p>
            </div>
            <div class="cookie-buttons">
                <button id="btn-cookie-accept" class="cookie-button-accept btn btn-success py-2 fw-semibold rounded-0" style="width: 250px; max-width:100%;">Annehmen</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.openCart').click(function (){
        $(".sepetmain").toggleClass("d-none");
    });

    $('.sepet-iclose-icon').click(function () {
        $(".sepetmain").toggleClass("d-none");
    });

    $.ajax({
        url: "{{ route('cart.get-popup-data') }}",
        type: 'POST',
        data: {
            '_token' : "{{ csrf_token() }}",
        },
        success: function (response){
            // console.log(response.count);
            // console.log(response.items);

            $('.dynamicCartCount').text(response.count);
            $('.sepp-add-item').html(response.items);
        },
        error: function (response){
            console.log(response);
        }
    });

    function AddProduct(url){
        console.log(url);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                '_token' : "{{ csrf_token() }}",
            },
            success: function (response){
                console.log(response.count);
                console.log(response.items);

                $('.dynamicCartCount').text(response.count);
                $('.sepp-add-item').html(response.items);

                $(".sepetmain").toggleClass("d-none");
                $(".navbar-collapse").removeClass("show");
            },
            error: function (response){
                console.log(response);
            }
        });
    }

</script>
</body>
</html>
