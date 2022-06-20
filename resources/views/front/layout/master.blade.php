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

<!-- cookie warning toast -->
<div class="fixed-bottom p-4">
    <div class="toast bg-dark text-white w-100 mw-100" role="alert" data-autohide="false">
        <div class="toast-body p-4 d-flex flex-column">
            <h4>Cookie-Warnung</h4>
            <p>
                Diese Website speichert Daten wie Cookies, um die Website-Funktionalität einschließlich Analysen und Personalisierung zu ermöglichen. Durch die Nutzung dieser Website akzeptieren Sie automatisch, dass wir Cookies verwenden.
            </p>
            <div class="ml-auto">
                <button type="button" class="btn btn-outline-light mr-3" id="btnDeny">
                    Leugnen
                </button>
                <button type="button" class="btn btn-light" id="btnAccept">
                    Annehmen
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    function cookieConsent() {
        if (!getCookie('allowCookies')) {
            $('.toast').toast('show')
        }
    }

    $('#btnDeny').click(()=>{
        eraseCookie('allowCookies')
        $('.toast').toast('hide')
    })

    $('#btnAccept').click(()=>{
        setCookie('allowCookies','1',7)
        $('.toast').toast('hide')
    })

    // load
    cookieConsent()

    // for demo / testing only
    $('#btnReset').click(()=>{
        // clear cookie to show toast after acceptance
        eraseCookie('allowCookies')
        $('.toast').toast('show')
    })

    $('.toast').toast('show');


</script>

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
