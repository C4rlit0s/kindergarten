<?php if (!defined('FW')) {
	die('Forbidden');

	/**
	 * @var array $atts
	 */
}

$term_id = (int)$atts['category'];
$the_core_blog_view = @$atts['blog_view']['selected'];
$blog_type = !empty($atts['blog_type']) ? $atts['blog_type'] : 'blog-1';

$posts_per_page = (int)$atts['posts_number'];
if ($posts_per_page == 0) {
	$posts_per_page = -1;
}

if ($term_id == 0) {
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type' => 'post',
		'orderby' => 'date'
	);
} else {
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type' => 'post',
		'orderby' => 'date',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $term_id
			)
		)
	);
}

$query = new WP_Query($args);

// set sidebar position for 3 columns full, and function get the specific wrap
$the_core_sidebar_position = (isset($atts['blog_view']['grid']['columns']) && $atts['blog_view']['grid']['columns'] == 'fw-portfolio-cols-3') ? 'full' : 'right';
$the_core_wrap_div = the_core_get_blog_wrap($the_core_blog_view, $the_core_sidebar_position);

if ($the_core_blog_view == 'grid') {
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

// for desktop
if (isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if (isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if (isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if (isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-mobile-hide-element';
}

// unique class
if (isset($atts['unique_id'])) {
	$atts['class'] .= ' tf-sh-' . $atts['unique_id'];
} else {
	$atts['class'] .= ' ' . uniqid('tf-sh-');
}

// extra options for post meta
$extra_options = array();
if (isset($atts['post_date'])) $extra_options['extra_options']['post_date'] = $atts['post_date'];
if (isset($atts['post_author'])) $extra_options['extra_options']['post_author'] = $atts['post_author'];
if (isset($atts['post_categories'])) $extra_options['extra_options']['post_categories'] = $atts['post_categories'];
if (isset($atts['display_comments_number'])) $extra_options['extra_options']['display_comments_number'] = $atts['display_comments_number'];
if (isset($atts['blog_title'])) $extra_options['extra_options']['blog_title'] = $atts['blog_title'];
if (isset($atts['button_options'])) $extra_options['extra_options']['button_options'] = $atts['button_options'];

/*----------------Animation option--------------*/
$data_animation = '';
if (isset($atts['animation_group'])) {
	// get animation class and delay
	if ($atts['animation_group']['selected'] == 'yes') {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if (!empty($atts['animation_group']['yes']['animation']['animation'])) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if (!empty($atts['animation_group']['yes']['animation']['delay'])) {
			$data_animation .= ' data-animation-delay="' . (int)esc_attr($atts['animation_group']['yes']['animation']['delay']) . '"';
		}
	}
}
/*----------------End Animation----------------*/
?>
<div class="fw-shortcode-latest-posts postlist <?php echo the_core_get_blog_view($the_core_blog_view, 'class', $the_core_sidebar_position); ?> <?php echo esc_attr($atts['class']); ?>" <?php echo $data_animation; ?> <?php echo the_core_get_blog_view($the_core_blog_view, 'id', $the_core_sidebar_position) ?>>
	<?php if ($query->have_posts()) :
		// Start the Loop.
		while ($query->have_posts()) : $query->the_post();
			echo $the_core_wrap_div['start'];
			if( $post_format = get_post_format() ) {
				echo the_core_render_view(fw_locate_theme_path('/templates/' . $blog_type . '/content-' . $post_format . '.php'), $extra_options);
			} else {
				echo the_core_render_view(fw_locate_theme_path('/templates/' . $blog_type . '/content.php'), $extra_options);
			}
			echo $the_core_wrap_div['end'];
		endwhile;
	else :
		// If no content, include the "No posts found" template.
		get_template_part('content', 'none');
	endif; ?>
</div>
<?php wp_reset_query(); ?>