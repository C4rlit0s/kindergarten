<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

$the_core_template_directory = get_template_directory_uri();
// include media
wp_enqueue_media();

if ( defined( 'FW' ) ) {
    $the_core_version = fw()->theme->manifest->get_version();
} else {
    $the_core_version = '1.0';
}

wp_enqueue_style(
	'css-theme-admin',
	$the_core_template_directory . '/css/theme-admin.css',
	array(),
    $the_core_version
);

if( is_rtl() ) {
	wp_enqueue_style(
		'css-admin-rtl',
		$the_core_template_directory . '/css/admin-rtl.css',
		array(),
        $the_core_version
	);
}

wp_enqueue_script(
	'js-theme-admin',
	$the_core_template_directory . '/js/theme-admin.js',
	array( 'jquery', ),
    $the_core_version,
	true
);

