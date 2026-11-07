<?php
/**
 * Styles and scripts.
 *
 * The legacy stack (Bootstrap 4, the original template CSS and its jQuery
 * plugins) is loaded in the same order as before, so the site looks and
 * behaves the same. New work goes into assets/css/input.css (Tailwind).
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

/**
 * URL of a file in assets/legacy.
 *
 * @param string $path Path relative to assets/legacy.
 * @return string
 */
function kj_legacy_uri( $path ) {
	return get_template_directory_uri() . '/assets/legacy/' . ltrim( $path, '/' );
}

/**
 * Enqueue the stylesheets, in the original order.
 */
function kj_styles() {
	$styles = array(
		'kj-mdi-font'     => 'vendor/mdi-font/css/material-design-iconic-font.min.css',
		'kj-fontawesome'  => 'vendor/font-awesome-5/css/fontawesome-all.min.css',
		'kj-themify'      => 'vendor/themify-font/themify-icons.css',
		'kj-poppins'      => 'css/poppins-font.min.css',
		'kj-bootstrap'    => 'vendor/bootstrap-4.1/bootstrap.min.css',
		'kj-animate'      => 'vendor/animate.css/animate.min.css',
		'kj-hamburgers'   => 'vendor/css-hamburgers/hamburgers.min.css',
		'kj-animsition'   => 'vendor/animsition/animsition.min.css',
		'kj-slick'        => 'vendor/slick/slick.css',
		'kj-select2'      => 'vendor/select2/select2.min.css',
		'kj-rev-layers'   => 'vendor/revolution/css/layers.css',
		'kj-rev-nav'      => 'vendor/revolution/css/navigation.css',
		'kj-rev-settings' => 'vendor/revolution/css/settings.css',
		'kj-main'         => 'css/main.css',
		'kj-base'         => 'css/base.css',
	);

	$previous = array();
	foreach ( $styles as $handle => $path ) {
		wp_enqueue_style( $handle, kj_legacy_uri( $path ), $previous, KJ_THEME_VERSION );
		$previous = array( $handle );
	}

	$style = get_theme_file_path( 'assets/css/style.css' );
	if ( file_exists( $style ) ) {
		wp_enqueue_style( 'kj-style', get_template_directory_uri() . '/assets/css/style.css', $previous, (string) filemtime( $style ) );
	}
}
add_action( 'wp_enqueue_scripts', 'kj_styles', 5 );

/**
 * Enqueue the scripts in the footer, in the original order.
 *
 * The template ships its own jQuery build; the plugins below were written
 * against it, so it stays instead of WordPress' bundled jQuery.
 */
function kj_scripts() {
	$scripts = array(
		'kj-jquery'          => 'vendor/jquery/jquery.min.js',
		'kj-bootstrap'       => 'vendor/bootstrap-4.1/bootstrap.min.js',
		'kj-animsition'      => 'vendor/animsition/animsition.min.js',
		'kj-slick'           => 'vendor/slick/slick.min.js',
		'kj-waypoints'       => 'vendor/waypoints/jquery.waypoints.min.js',
		'kj-wow'             => 'vendor/wow/wow.min.js',
		'kj-counterup'       => 'vendor/jquery.counterup/jquery.counterup.min.js',
		'kj-isotope'         => 'vendor/isotope/isotope.pkgd.min.js',
		'kj-imagesloaded'    => 'vendor/isotope/imagesloaded.pkgd.min.js',
		'kj-matchheight'     => 'vendor/matchHeight/jquery.matchHeight-min.js',
		'kj-select2'         => 'vendor/select2/select2.min.js',
		'kj-sweetalert'      => 'vendor/sweetalert/sweetalert.min.js',
		'kj-nouislider'      => 'vendor/noUiSlider/nouislider.min.js',
		'kj-rev-tools'       => 'vendor/revolution/js/jquery.themepunch.tools.min.js',
		'kj-revolution'      => 'vendor/revolution/js/jquery.themepunch.revolution.min.js',
		'kj-rev-video'       => 'vendor/revolution/js/extensions/revolution.extension.video.min.js',
		'kj-rev-slideanims'  => 'vendor/revolution/js/extensions/revolution.extension.slideanims.min.js',
		'kj-rev-actions'     => 'vendor/revolution/js/extensions/revolution.extension.actions.min.js',
		'kj-rev-layeranim'   => 'vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js',
		'kj-rev-kenburn'     => 'vendor/revolution/js/extensions/revolution.extension.kenburn.min.js',
		'kj-rev-navigation'  => 'vendor/revolution/js/extensions/revolution.extension.navigation.min.js',
		'kj-rev-migration'   => 'vendor/revolution/js/extensions/revolution.extension.migration.min.js',
		'kj-rev-parallax'    => 'vendor/revolution/js/extensions/revolution.extension.parallax.min.js',
		'kj-rev-carousel'    => 'vendor/revolution/js/extensions/revolution.extension.carousel.min.js',
		'kj-rev-config'      => 'js/config-revolution.min.js',
		'kj-global'          => 'js/global.js',
	);

	$previous = array();
	foreach ( $scripts as $handle => $path ) {
		wp_enqueue_script( $handle, kj_legacy_uri( $path ), $previous, KJ_THEME_VERSION, true );
		$previous = array( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'kj_scripts', 5 );
