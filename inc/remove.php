<?php
/**
 * Strip WordPress output and admin items the site does not use.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

// SureRank prints the canonical URL.
remove_action( 'wp_head', 'rel_canonical' );

add_filter( 'xmlrpc_enabled', '__return_false' );

// The front end has always been shown without the admin bar.
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Comments are not used on this site.
 */
function kj_remove_comments_admin() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'kj_remove_comments_admin', 999 );

/**
 * Drop the comments node from the admin bar.
 *
 * @param WP_Admin_Bar $admin_bar Admin bar instance.
 */
function kj_remove_comments_admin_bar( $admin_bar ) {
	$admin_bar->remove_node( 'comments' );
}
add_action( 'admin_bar_menu', 'kj_remove_comments_admin_bar', 999 );
