
var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        speed:1500,
        loop: true,
        autoplay: {
        delay: 1500,
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
