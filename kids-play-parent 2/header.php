<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<?php the_core_page_transition_loader(); ?>
	<?php the_core_page_transition_begin(); ?>
		<div id="page" class="hfeed site">
			<?php the_core_header_mobile_menu(); ?>
			<?php the_core_header(); ?>
			<div id="main" class="site-main">