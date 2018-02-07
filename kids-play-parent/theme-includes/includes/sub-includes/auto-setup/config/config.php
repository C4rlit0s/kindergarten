<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
return array(
	/**
	 * Array for demos
	 */
	'demos'              => array(
		'kids-play' => array(
			array(
				'name' => 'WooCommerce',
				'slug' => 'woocommerce',
			),
		),
	),
	'plugins'            =>
		array(
			array(
				'name'   => 'Revolution Slider',
				'slug'   => 'revslider',
				'source' => 'http://updates.themefuse.com/plugins/revslider.zip'
			),
			array(
				'name'   => 'LayerSlider WP',
				'slug'   => 'LayerSlider',
				'source' => 'http://updates.themefuse.com/plugins/LayerSlider.zip'
			),
		),
	'theme_id'           => 'kids-play',
	'child_theme_source' => 'http://updates.themefuse.com/plugins/kids-play-child.zip',
	'has_demo_content'   => true
);
