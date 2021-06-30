/*Header Code*/
(function ($) {
    "use strict";

    $(function () {
        var header = $(".start-style");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });
    });

    //Animation

    $(document).ready(function () {
        $('body.hero-anime').removeClass('hero-anime');
    });

    //Menu On Hover

    $('body').on('mouseenter mouseleave', '.nav-item', function (e) {
        if ($(window).width() > 750) {
            var _d = $(e.target).closest('.nav-item');
            _d.addClass('show');
            setTimeout(function () {
                _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
            }, 1);
        }
    });


})(jQuery);

$(document).ready(function () {
     /*Achievements alliance slider*/
  $(".ac-alliance-slider").owlCarousel({
        dots: false,
        loop: true,
        touchDrag: true,
        items:1,
        autoplay: true,
        nav: true,
        autoplayTimeout:6000,
        responsiveClass:true,

    });
    /*Home Slider*/
    $(".home-slides").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            }
        }
    });

        /*About Team Slider*/
    $(".a-team-slide").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        dots: false,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 3,
            },
            767: {
                items: 6
            }
        }
    });
 
   /* Enblers Industry Code*/
    $('.industry-box:not(.first)').hover(function () {
            $('.img-industries img:nth-of-type(' + (parseInt($('.industry-box:not(.first)').index($(this))) + 1) + ')').animate({
                opacity: '1'
            }, 400);
        },
        function () {
            $('.img-industries img').css('opacity', '0');
        });
});