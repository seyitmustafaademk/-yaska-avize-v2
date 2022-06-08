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



// Swiper Hero

var swiper = new Swiper(".swiper-productHeroBottom", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper(".swiper-productHeroTop", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

// END Swiper Hero


var swiper3 = new Swiper(".differentSwiper", {
    slidesPerView: "3",
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});


$(document).ready(function() {
    $('.animsition').animsition();
});
