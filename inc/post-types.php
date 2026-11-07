<?php
/**
 * Custom post types.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the projects post type.
 */
function kj_register_post_types() {
	register_post_type(
		'projecten',
		array(
			'labels'       => array(
				'name'          => __( 'Projecten', 'kj' ),
				'singular_name' => __( 'Project', 'kj' ),
				'add_new_item'  => __( 'Nieuw project', 'kj' ),
				'edit_item'     => __( 'Project bewerken', 'kj' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-palmtree',
			'supports'     => array( 'title' ),
			'taxonomies'   => array( 'post_tag', 'category' ),
		)
	);
}
add_action( 'init', 'kj_register_post_types' );

/**
 * Refresh rewrite rules once, when the theme is activated.
 */
function kj_flush_rewrites() {
	kj_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'kj_flush_rewrites' );
