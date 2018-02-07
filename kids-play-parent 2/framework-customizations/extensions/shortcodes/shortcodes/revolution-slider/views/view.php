<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! function_exists( 'set_revslider_as_theme' ) ) {
	return;
}

echo ( isset( $atts['slider'] ) && ! empty( $atts['slider'] ) ) ? do_shortcode( $atts['slider'] ) : '';
