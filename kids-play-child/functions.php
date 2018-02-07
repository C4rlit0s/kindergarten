<?php if ( ! defined( 'WP_DEBUG' ) ) {
	die( 'Direct access forbidden.' );
}

function kids_play_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'kids_play_theme_enqueue_styles' );

