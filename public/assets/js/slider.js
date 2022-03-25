$(document).ready(function() {
    $('#slider-carousel').owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            640: {
                items: 1
            },
            800: {
                items: 1
            }
        },
        pagination: false,
        navigation: false,
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        center: true,
        autoWidth: false,
    });
});

$(document).ready(function() {
    $('#slider-galeri').owlCarousel({
        responsive: {
            0: {
                items: 1
            }
        },
        pagination: false,
        navigation: false,
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        center: true,
        autoWidth: false,
    });
});

$(document).ready(function() {
    $('#slider-pengurus').owlCarousel({
        responsive: {
            0: {
                items: 1
            }
        },
        pagination: false,
        navigation: false,
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        center: true,
        autoWidth: false,
    });
});
