if ($(".reference-slide").length > 0) {
    var second = new Swiper(".reference-slide", {
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
        },
        slidesPerView: 7,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },

            1366: {
                slidesPerView: 5,
                spaceBetween: 30,
            },
        },
    });
}

if ($(".testimonialSwiper").length > 0) {
    var swiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
            nextEl: "#nextBtn",
            prevEl: "#prevBtn",
        },
        scrollbar: {
            el: ".swiper-scrollbar",
            hide: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 25,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            1366: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
}

if ($(".gallerySwiper").length > 0) {
    var swiper3 = new Swiper(".gallerySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        grabCursor: true,
        loop: true,
        // freeMode: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-example-next",
            prevEl: ".swiper-example-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
        },
    });
}


// Product Detail Hero

const changeImg = (img) => {
    $(".productHero img").attr("src", img);
    e.preventDefault();
}


$(".headerDetail").hide();
$(".bi-list").click(function (e) {
    $(".headerDetail").toggle();
});

/*

// Price Div // Archive

  var status = false;
  const priceStatic = parseFloat($(".detailPrice .priceSpan").data("price"));
  let sonuc = 0;
  $(".detailPrice i").click(function (e) {
    let priceValue = parseFloat($(".detailPrice .priceSpan").text());
    $(".detailPrice .priceSpan").text(priceValue + priceStatic);
  });

*/


var prevScrollPos = $(window).scrollTop();
$(window).scroll(function () {
    var currentScrollPos = $(window).scrollTop();
    if (prevScrollPos > currentScrollPos) {
        $("header").css("top", 0);

    } else {
        $("header").css("top", -85);
        $("header").addClass("headerAdd");
        $("header").removeClass("bg-dark");
        $("header .nav-logo img").attr("src", "/assets/img/logo/logo2.svg");

    }
    prevScrollPos = currentScrollPos;
});


// Product Detail Question Form

$(".questionDiv").hide();
if ($(".questionBtn").click(() => {
    $(".questionDiv").toggle(300);
})) ;

$(".questionDivClose").click(() => {
    $(".questionDiv").hide(100);
});

Sho3

// Swiper Hero

var swiper = new Swiper(".swiper-productHeroBottom", {
    loop: true,
    // autoWidth: true,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper(".swiper-productHeroTop", {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});
// ![](../../../../../../Users/pc1177/AppData/Local/Temp/1655367066-20220312_125254.jpg)

// END Swiper Hero
var swiper3 = new Swiper(".differentSwiper", {
    slidesPerView: "3",
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});



/**************************************************************************************/
/**************************************************************************************/
/**************************************************************************************/
// COOKIE POPUP KODLARI GELECEK
$(document).ready(function (){
    var cookie_wrapper = $('#custom-cookie-wrapper');
    var temp_cookie = Cookies.get('cookie');

    if ( temp_cookie !== 'true' ){
        cookie_wrapper.removeClass('d-none');
    }

    $('#btn-cookie-accept').click(function (){
        cookie_wrapper.addClass('d-none');
        var date = new Date();
        var m = 1000000;
        date.setTime(date.getTime() + (m * 60 * 1000));
        Cookies.set('cookie', 'true',  { expires: date });
    });
});


/**************************************************************************************/
/**************************************************************************************/
/**************************************************************************************/
// FAQ KODLARI
const items = document.querySelectorAll("section.faq-new .accordion button");

function toggleAccordion() {
    const itemToggle = this.getAttribute('aria-expanded');

    for (i = 0; i < items.length; i++) {
        items[i].setAttribute('aria-expanded', 'false');
    }

    if (itemToggle === 'false') {
        this.setAttribute('aria-expanded', 'true');
    }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));