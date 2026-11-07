<?php
/**
 * Theme supports, menus and image sizes.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register theme features.
 */
function kj_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'header-menu' => __( 'Hoofdmenu', 'kj' ),
		)
	);

	// Sizes kept from the original theme so existing uploads keep matching.
	add_image_size( 'large', 700, 0, true );
	add_image_size( 'medium', 250, 0, true );
	add_image_size( 'small', 120, 0, true );
	add_image_size( 'project-size', 1024, 768, true );
}
add_action( 'after_setup_theme', 'kj_setup' );

/**
 * Keep the body class the stylesheet relies on for project detail pages.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function kj_body_class( $classes ) {
	if ( is_singular( 'projecten' ) ) {
		$classes[] = 'project';
	}
	return $classes;
}
add_filter( 'body_class', 'kj_body_class' );
