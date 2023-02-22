
var swiper = new Swiper(".mySwiper", {
    centeredSlides: true,
    speed: 1500,
    spaceBetween: 20,
    loop: true,
    slidesPerGroup: 3,
    slidesPerView: 6,

    pagination: {
        el: ".swiper-pagination",
        clickable: true,

    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",

    },

});


// ------------------------------------------------------------

var swiper = new Swiper(".mySwiperCategory ", {
    centeredSlides: true,
    speed: 1500,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,

    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",

    },

});
