/* RTL Footer Menu */

body.rtl .fw-footer-menu-right .fw-footer-menu li:first-child a {
    margin-left: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-margin']); ?>;
}
body.rtl .fw-footer-menu-right .fw-footer-menu li:last-child a {
    margin-left: 0;
}
body.rtl .fw-footer-menu-left .fw-footer-menu li:first-child a {
    margin-left: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-margin']); ?>;
}
body.rtl .fw-footer-menu-left .fw-footer-menu li:last-child a {
    margin-left: 0;
}