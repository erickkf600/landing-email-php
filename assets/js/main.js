$(function () {
    var Page = (function () {
        var $navArrows = $('#nav-arrows'),
        $nav = $('#nav-dots > span'),
        slitslider = $('#slider').slitslider({
            onBeforeChange: function (slide, pos) {
                $nav.removeClass('nav-dot-current');
                $nav.eq(pos).addClass('nav-dot-current');
            }
        }),
        init = function () {
            initEvents();
        },
        initEvents = function () {
                // add navigation events
                $navArrows.children(':last').on('click', function () {
                    slitslider.next();
                    return false;
                });
                $navArrows.children(':first').on('click', function () {
                    slitslider.previous();
                    return false;
                });
                $nav.each(function (i) {

                    $(this).on('click', function (event) {
                        var $dot = $(this);
                        if (!slitslider.isActive()) {
                            $nav.removeClass('nav-dot-current');
                            $dot.addClass('nav-dot-current');
                        }
                        slitslider.jump(i + 1);
                        return false;
                    });
                });
            };
            return { init: init };
        })();
        Page.init();
    });

$(document).ready(function () {
    $("#navegacao").removeClass("header-animada");
    $(window).scroll(function () {
        if ($(window).scrollTop() > 400) {
            $("#navegacao").addClass("header-animada");
        } else {
            $("#navegacao").removeClass("header-animada");
        }
    });

    // Scroll suave para link interno
    $('nav a').click(function(e){
        e.preventDefault();
        var id = $(this).attr('href'),
        menuHeight = $('nav').innerHeight(),
        targetOffset = $(id).offset().top;
        $('html, body').animate({
            scrollTop: targetOffset - menuHeight
        }, 500);
    });

});

