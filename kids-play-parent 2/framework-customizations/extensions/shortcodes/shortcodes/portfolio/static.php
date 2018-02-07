<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_template_directory = get_template_directory_uri();
$the_core_version = fw()->theme->manifest->get_version();

wp_enqueue_script(
	'fw-shortcode-portfolio-isotope',
	$the_core_template_directory . '/js/isotope.pkgd.min.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
    'fw-modulo-columns',
    $the_core_template_directory . '/js/modulo-columns.js',
    array( 'jquery' ),
    $the_core_version,
    true
);

wp_enqueue_script(
	'fw-shortcode-portfolio-script',
	$the_core_template_directory . '/framework-customizations/extensions/shortcodes/shortcodes/portfolio/static/js/portfolio-script.js',
	array( 'jquery' ),
	$the_core_version,
	true
);