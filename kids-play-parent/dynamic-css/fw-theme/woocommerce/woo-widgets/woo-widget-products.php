/* Woocommerce Widget Product & Widget Recently Viewed-Reviews Product (in sidebar) */
/* -------------------------------------------------- */
.widget.widget_recently_viewed_products ul.product_list_widget li a,
.widget_products ul.product_list_widget li a,
.widget_recent_reviews ul.product_list_widget li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget.widget_recently_viewed_products ul.product_list_widget li a:hover,
.widget_products ul.product_list_widget li a:hover,
.widget_recent_reviews ul.product_list_widget li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget_products .product_list_widget del {
  color: #d22e0e;
}
