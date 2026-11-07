<?php
/**
 * Versteegen Tuinen theme bootstrap.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'KJ_THEME_VERSION' ) ) {
	define( 'KJ_THEME_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );
}

require_once get_template_directory() . '/inc/remove.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/acf.php';
require_once get_template_directory() . '/inc/scripts.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/cookie-consent.php';
