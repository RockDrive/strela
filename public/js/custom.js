$(function() {

    const slides = $('.slider__item-image');

    function addaptiveBanners () {
        if ($(window).width() <= 481) {
            slides.each(function() {
                let ths = $(this);
                let img = ths.data('mob-bg');
                ths.css('background-image', `url(${img})`)
            })
        } else {
            slides.each(function() {
                let ths = $(this);
                let img = ths.data('desktop-bg');
                ths.css('background-image', `url(${img})`)
            })
        }
    }

    addaptiveBanners();

    $(window).on('resize', function() {
        addaptiveBanners()
    });

})
