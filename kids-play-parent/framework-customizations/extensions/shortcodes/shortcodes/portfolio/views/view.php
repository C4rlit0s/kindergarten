<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

 /**
 * @var array $atts
 */

if ( ! fw_ext( 'portfolio' ) ) {
	// if portfolio extensions is disabled return
	return;
}

$term_id                = $atts['category'];
$uniqid                 = uniqid();
$portfolio_style        = isset ( $atts['portfolio_style']['selected'] ) ? $atts['portfolio_style']['selected'] : 'style1';
$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );

if ( $atts['portfolio_style']['selected'] == 'style2' ) {
	$advanced_options = $atts['portfolio_style']['style2'];
} elseif ( $atts['portfolio_style']['selected'] == 'style3' ) {
	$advanced_options = $atts['portfolio_style']['style3'];
} else {
	$advanced_options = array();
}

$loop_data = array(
	'settings'         => $ext_portfolio_instance->get_settings(),
	'image_sizes'      => $ext_portfolio_instance->get_image_sizes(),
	'listing_classes'  => '',
	'term_id'          => $term_id,
	'portfolio_type'   => $atts['portfolio_type'], // only for portraits/landscape,
	'advanced_options' => $advanced_options,
);

$posts_per_page = (int) $atts['posts_per_page'];
if ( $posts_per_page == 0 ) {
	$posts_per_page = - 1;
}

$tax_query = array();
if ( $term_id != '0' ) {
	$tax_query = array(
		array(
			'taxonomy' => $loop_data['settings']['taxonomy_name'],
			'field'    => 'id',
			'terms'    => $term_id
		)
	);
}
$args  = array(
	'posts_per_page' => $posts_per_page,
	'post_type'      => $loop_data['settings']['post_type'],
	'tax_query'      => $tax_query
);
$query = new WP_Query( $args );

$term = get_term( $term_id, $loop_data['settings']['taxonomy_name'] );
// set special query for loop data
set_query_var( 'fw_portfolio_loop_data', $loop_data );
set_query_var( 'term', @$term->slug );
set_query_var( 'taxonomy', $loop_data['settings']['taxonomy_name'] );

$filter_enabled = fw_get_db_settings_option( 'enable_portfolio_filter', 'yes' );

if( isset( $atts['portfolio_columns'] ) ) {
	$columns = $atts['portfolio_columns'];
}
else{
	$columns = 'fw-portfolio-cols-3';
}

if ( $portfolio_style == 'style1' ) {
	$portfolio_columns = 'fw-portfolio-1 '.$columns;
} elseif ( $portfolio_style == 'style2' ) {
	$portfolio_columns = 'fw-portfolio-2 '.$columns.' bordered';
} else {
	$portfolio_columns = 'fw-portfolio-3 '.$columns;
}

if( $columns == 'fw-portfolio-cols-4' ) {
    $columns_number = 4;
}
elseif( $columns == 'fw-portfolio-cols-2' ) {
    $columns_number = 2;
}
else {
    $columns_number = 3;
}

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if ( ! empty( $atts['animation_group']['yes']['animation']['animation'] ) ) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if ( ! empty( $atts['animation_group']['yes']['animation']['delay'] ) ) {
			$data_animation .= ' data-animation-delay="' . (int) esc_attr( $atts['animation_group']['yes']['animation']['delay'] ) . '"';
		}
	}
}
/*----------------End Animation----------------*/

// portfolio advanced settings
$content_alignment = $content_position = '';
if ( $atts['portfolio_style']['selected'] == 'style1' ) {
	$portfolio_advanced_style = $atts['portfolio_style']['style1'];
	if ( isset( $portfolio_advanced_style['style1_advanced_styling'] ) ) {
		$content_position  = $portfolio_advanced_style['style1_advanced_styling']['content_position'];
		$content_alignment = $portfolio_advanced_style['style1_advanced_styling']['content_alignment'];
	}
}
elseif ( $atts['portfolio_style']['selected'] == 'style3' ) {
	$portfolio_advanced_style = $atts['portfolio_style']['style3'];
	if ( isset( $portfolio_advanced_style['style1_advanced_styling'] ) ) {
		$content_position  = $portfolio_advanced_style['style1_advanced_styling']['content_position'];
		$content_alignment = $portfolio_advanced_style['style1_advanced_styling']['content_alignment'];
	}
}
elseif ( $atts['portfolio_style']['selected'] == 'style2' ) {
	$portfolio_advanced_style = $atts['portfolio_style']['style2'];
	if ( isset( $portfolio_advanced_style['style2_advanced_styling'] ) ) {
		$content_alignment = $portfolio_advanced_style['style2_advanced_styling']['content_alignment'];
	}
}

if( isset($term->parent) && $term->parent > 0 ) {
	$the_core_template_directory_uri = get_template_directory_uri();
	wp_enqueue_script(
		'masonry-theme',
		$the_core_template_directory_uri . '/js/masonry.pkgd.min.js',
		array('jquery'),
		'1.0',
		true
	);
	wp_enqueue_script(
		'start-masonry',
		$the_core_template_directory_uri . '/js/start-masonry.js',
		array('jquery', 'masonry-theme'),
		'1.0',
		true
	);
}
?>
<div class="fw-col-inner">
	<div class="tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> fw-portfolio <?php echo esc_attr($portfolio_columns) . ' ' . esc_attr($content_position) . ' ' . esc_attr($content_alignment); ?> <?php echo esc_attr($atts['class']); ?> <?php echo esc_attr($atts['portfolio_type']); ?>" <?php echo $data_animation; ?>>
		<?php fw_theme_portfolio_filter( 'yes', $uniqid, true, $query->posts ); ?>
		<?php if ( $query->have_posts() ) : ?>
			<div class="row fw-portfolio-wrapper">
				<ul id="fw-portfolio-list-<?php echo esc_attr($uniqid); ?>" class="fw-portfolio-list clearfix" data-columns-number="<?php echo $columns_number; ?>">
					<?php
					while ( $query->have_posts() ) : $query->the_post();
						get_template_part( 'framework-customizations/extensions/portfolio/views/loop', $portfolio_style );
					endwhile;
					?>
				</ul>
			</div>
		<?php else :
			get_template_part( 'content', 'none' );
		endif;
		?>
	</div><!-- /.fw-portfolio -->
</div>
<?php wp_reset_query(); ?>