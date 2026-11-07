<?php
/**
 * SureCookie: no branding, and the site logo in the banner.
 *
 * Hooks the stored settings themselves, so the banner, preferences modal
 * and admin agree, also after a reset or on a fresh copy of the database.
 * `remove_branding` is a Pro setting (SureCookie Business).
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

/**
 * Force the branding off and fill in the logo when none is set.
 *
 * @param mixed $settings Stored SureCookie settings.
 * @return array<string, mixed>
 */
function kj_surecookie_settings( $settings ) {
	$settings = is_array( $settings ) ? $settings : array();

	$settings['remove_branding'] = true;

	if ( empty( $settings['banner_logo'] ) ) {
		$settings['banner_logo'] = kj_logo_url();
	}

	return $settings;
}
add_filter( 'option_surecookie_settings', 'kj_surecookie_settings' );
add_filter( 'default_option_surecookie_settings', 'kj_surecookie_settings' );

/**
 * URL of the site logo used in the header.
 *
 * @return string
 */
function kj_logo_url() {
	return content_url( 'uploads/2021/09/versteegen-tuinen-logo.png' );
}
