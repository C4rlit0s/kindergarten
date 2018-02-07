jQuery(window).load(function ($) {
    "use strict";

    var $ = jQuery,
        screenRes = $(window).width();

    // Page Transition
    function pageTransition() {
        var pageTransitionDiv = $('.fw-page-transition'),
            pageTransitionIn = pageTransitionDiv.data('page-transition-in'),
            pageTransitionOut = pageTransitionDiv.data('page-transition-out'),
            pageTransitionDurationIn = pageTransitionDiv.data('page-transition-duration-in'),
            pageTransitionDurationOut = pageTransitionDiv.data('page-transition-duration-out'),
            pageTransitionSpinner = $('body').find('.fw-page-transition-spinner');

        // Transition In
        if (!pageTransitionDiv.hasClass(pageTransitionIn)) {
            pageTransitionSpinner.fadeOut();

            pageTransitionDiv.css({
                'animation-duration' : pageTransitionDurationIn / 1e3 + "s"
            }).addClass(pageTransitionIn);

            setTimeout(function(){
                pageTransitionDiv.removeClass(pageTransitionIn).addClass('pageTransitionEnd');
            }, pageTransitionDurationIn);
        }

        // Transition Out
        $(window).on('beforeunload',function(){
            if (!pageTransitionDiv.hasClass(pageTransitionIn)) {
                pageTransitionDiv.css({'animation-duration' : pageTransitionDurationOut / 1e3 + "s"});
                pageTransitionDiv.removeClass('pageTransitionEnd').addClass(pageTransitionOut);
                pageTransitionDiv.css('animation-duration', pageTransitionDurationOut);
                pageTransitionSpinner.fadeIn();
            }
        });
    }
    if(screenRes > 1199) {
        pageTransition();
    }
    $(window).resize(function(){
        var screenRes = $(window).width();
        if(screenRes > 1199) {
            pageTransition();
        }
    });
});