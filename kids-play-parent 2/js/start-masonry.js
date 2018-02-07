jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery;

    // masonry grid view
    if ( $(".postlist").hasClass("postlist-grid") ) {
        var $gridcontainer = $('.postlist-grid');
        $gridcontainer.masonry({
            itemSelector: '.postlist-col'
        });
    }

    // portfolio masonry
    if ( $(".fw-portfolio-list").length > 0 ) {
        var $gridcontainer = $('.fw-portfolio-list');
        $gridcontainer.masonry({
            itemSelector: 'li'
        });
    }

    // Woocommerce Related Products
    if ( $(".has-sidebar .related.products").length > 0 ) {
        var $gridcontainer = $('ul.products');
        $gridcontainer.masonry({
            itemSelector: 'li'
        });
    }
});