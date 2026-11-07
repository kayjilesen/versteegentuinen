<?php
/**
 * ACF options pages.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

/**
 * Options page for the footer lists (diensten, kernwaarden).
 *
 * Same registration as the original theme, so the existing field group
 * location rules keep matching.
 */
function kj_acf_options_pages() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page();
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Theme Footer Settings',
			'menu_title'  => 'Footer',
			'parent_slug' => 'theme-general-settings',
		)
	);
}
add_action( 'acf/init', 'kj_acf_options_pages' );
