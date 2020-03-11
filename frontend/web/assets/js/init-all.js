$(document).ready(function () {
    "use strict";
    // Pageloader
    $(function () {
        $(".loader-item").delay(700).fadeOut();
        $("#pageloader").delay(800).fadeOut("slow");
    });

    // Navbar
    $(function () {
        /* ---------------------
         Sticky
         --------------------- */
        if ($('#sticker').length) {
            $("#sticker").sticky({topSpacing: 0});
        }
        /* --------------------------
         Home Background Super Slider
         -------------------------- */
        if ($('#slides').length) {
            $('#slides').superslides({});
        }
    });

     $(function() {
 
  $("#explore-11").owlCarousel({
 
   
    //Autoplay
    autoPlay : true,
    goToFirst : true,
    goToFirstSpeed : 1000,
    
 
    // Responsive 
    responsive: true,
    items : 4,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,2],
    itemsMobile : [479,1]
 
})
 
});

    // OwlCarousel
    $(function () {
        if ($('.owl-carousel').length) {
            $(".owl-carousel").each(function (index) {
                var effect_mode = $(this).data('effect');
                var autoplay = $(this).data('autoplay');
                var navigation = $(this).data('navigation');
                var pagination = $(this).data('pagination');
                var singleitem = $(this).data('singleitem');
                var items = $(this).data('items');
                var itemsdesktop = $(this).data('desktop');
                var itemsdesktopsmall = $(this).data('desktopsmall');
                var itemstablet = $(this).data('tablet');
                var itemsmobile = $(this).data('mobile');
                if (itemsdesktop > 0) {
                    itemsdesktop = [1199, itemsdesktop];
                }
                if (itemsdesktopsmall > 0) {
                    itemsdesktopsmall = [979, itemsdesktopsmall];
                }
                if (itemstablet > 0) {
                    itemstablet = [479, itemstablet];
                }
                if (itemsmobile > 0) {
                    itemsmobile = [479, itemsmobile];
                }
                $(this).owlCarousel({
                    transitionStyle: effect_mode,
                    autoPlay: autoplay,
                    navigation: navigation,
                    pagination: pagination,
                    singleItem: singleitem,
                    items: items,
                    itemsDesktop: itemsdesktop,
                    itemsDesktopSmall: itemsdesktopsmall,
                    itemsTablet: itemstablet,
                    itemsMobile: itemsmobile,
                    navigationText: ['<i class="fa fa - angle - left"></i>', '<i class="fa fa - angle - right"></i>']
                });
            });
        }
    });




    // DataAnimations
    $(function () {
        $('[data-animation]').each(function () {
            var element = $(this);
            element.addClass('animated');
            element.appear(function () {

                var delay = ( element.data('delay') ? element.data('delay') : 1 );
                if (delay > 1) element.css('animation-delay', delay + 'ms');
                element.addClass(element.data('animation'));
                setTimeout(function () {
                    element.addClass('visible');
                }, delay);

            });
        });

    });

    // bgImage
    $(function () {
        var pageSection = $(".image-bg, .parallax-bg");
        pageSection.each(function (index) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
    });
    // funFactor
    $(function () {
        $(".count-number").appear(function () {
            $(this).each(function () {
                var datacount = $(this).attr('data-count');
                $(this).find('.counter').delay(6000).countTo({
                    from: 10,
                    to: datacount,
                    speed: 3000,
                    refreshInterval: 50,
                });
            });
        });
    });


    // portfolioFilter
    $(function () {
        if ($('#mix-container').length != 0) {
            $('#mix-container').mixItUp();
        }
    });

    // prettyPhoto
    $(function () {
        if ($("a[rel^='prettyPhoto'], a[data-rel^='prettyPhoto']").length != 0) {
            $("a[rel^='prettyPhoto'], a[data-rel^='prettyPhoto']").prettyPhoto({hook: 'data-rel', theme: "dark_square", social_tools: false, deeplinking: false});
        }
    });

    // backgroundVideo
    $(function () {
        if (typeof $.fn.mb_YTPlayer != 'undefined' && $.isFunction($.fn
                .mb_YTPlayer)) {
            var m = false;
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(
                    navigator.userAgent)) {
                m = true
            }
            var v = $('.player');
            if (m == false) {
                v.mb_YTPlayer();
                $('#video-controls a')
                    .each(function () {
                        var t = $(this);
                        t.on('click', (function (e) {
                            e.preventDefault();
                            if (t.hasClass(
                                    'fa-volume-off')) {
                                t.removeClass(
                                    'fa-volume-off'
                                )
                                    .addClass(
                                        'fa-volume-down'
                                    );
                                v.unmuteYTPVolume();
                                return false
                            }
                            if (t.hasClass(
                                    'fa-volume-down')) {
                                t.removeClass(
                                    'fa-volume-down'
                                )
                                    .addClass(
                                        'fa-volume-off'
                                    );
                                v.muteYTPVolume();
                                return false
                            }
                            if (t.hasClass('fa-pause')) {
                                t.removeClass(
                                    'fa-pause')
                                    .addClass('fa-play');
                                v.pauseYTP();
                                return false
                            }
                            if (t.hasClass('fa-play')) {
                                t.removeClass('fa-play')
                                    .addClass(
                                        'fa-pause');
                                v.playYTP();
                                return false
                            }
                        }));
                    });
                $('#video-controls')
                    .show();
            }
        }
    });





    // fancySelect
    $(function () {
        if ($(".fancy-select").length !== 0) {
            $('.fancy-select').fancySelect();
        }
    });

    //datePicker
    $(function () {
        if ($(".date-picker").length !== 0) {
            $(function () {
                $('.date-picker').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        }

    });

    //timePicker
    $(function () {
        if ($(".time-picker").length !== 0) {
            $(function () {
                $('.time-picker').datetimepicker({
                    format: 'LT'
                });
            });
        }
    });


});