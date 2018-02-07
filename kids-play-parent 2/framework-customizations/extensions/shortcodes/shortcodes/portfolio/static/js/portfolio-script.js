jQuery(document).ready(function ($) {
    "use strict";

    var portfolio_filter = jQuery('.portfolio_filter');
    if (portfolio_filter.length > 0) {
        portfolio_filter.each(function () {
            var filter  = jQuery(this);
            var isotope = jQuery(this).attr('data-isotope');
            var list_id = jQuery(this).attr('data-list-id');

            if (isotope != '1') {
                return;
            }

            /*var columns_number = parseInt( jQuery('#' + list_id).attr('data-columns-number') );
            var gutter = 1;
            if( columns_number == 3) {
                gutter = 2;
            }*/

            jQuery('#' + list_id).isotope({
                itemSelector: 'li',
                transitionDuration: '0.6s',
                layoutMode: 'moduloColumns'
                /*moduloColumns: {
                    columnWidth: columns_number,
                    gutter: gutter
                }*/
            });

            filter.on('click', '.categories-item', function (e) {
                e.preventDefault();
                jQuery('.categories-item').removeClass('active');
                jQuery(this).addClass('active');

                var option = jQuery(this).data('category'),
                    search = option ? function () {
                        var item = jQuery(this),
                            name = item.data('category') ? item.data('category') : '';
                        return name.match(new RegExp('\\b' + option + '\\b'));
                    } : '*';

                jQuery('#' + list_id).isotope({filter: search});
            });
        });
    }
});