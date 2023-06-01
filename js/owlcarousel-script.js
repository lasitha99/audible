$(".owl-carousel").owlCarousel({
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
    items: 6,
    loop: true,
    nav: false, //changed to remove dots
    dots: false, //changed to remove dots
    margin: 10,
    responsiveClass: true,
    autoHeight: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 7,
            nav: true,
            loop: false
        }
    }
});