<?php
/**
 * Template helpers.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

/**
 * Print the items of a menu location as the template's list markup.
 *
 * Top-level items become `li.menu-item`; their children go in a
 * `ul.sub-menu` and the parent gets `menu-item-has-children` plus a
 * chevron. The <ul> wrapper is left to the caller.
 *
 * @param string $location Registered menu location.
 */
function kj_menu_items( $location = 'header-menu' ) {
	$locations = get_nav_menu_locations();
	if ( empty( $locations[ $location ] ) ) {
		return;
	}

	$items = wp_get_nav_menu_items( $locations[ $location ] );
	if ( empty( $items ) ) {
		return;
	}

	$children = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent ) {
			$children[ (int) $item->menu_item_parent ][] = $item;
		}
	}

	foreach ( $items as $item ) {
		if ( $item->menu_item_parent ) {
			continue;
		}

		$sub     = $children[ $item->ID ] ?? array();
		$classes = array( 'menu-item' );
		if ( ! empty( $item->classes[0] ) ) {
			$classes[] = $item->classes[0];
		}
		if ( $sub ) {
			$classes[] = 'menu-item-has-children';
		}

		printf(
			'<li class="%1$s"><a href="%2$s" class="nav-link">%3$s%4$s</a>',
			esc_attr( implode( ' ', $classes ) ),
			esc_url( $item->url ),
			esc_html( $item->title ),
			$sub ? '<i class="fas fa-chevron-down"></i>' : ''
		);

		if ( $sub ) {
			echo '<ul class="sub-menu">';
			foreach ( $sub as $child ) {
				printf( '<li class="menu-item"><a href="%1$s">%2$s</a></li>', esc_url( $child->url ), esc_html( $child->title ) );
			}
			echo '</ul>';
		}

		echo '</li>';
	}
}

/**
 * First image of a project's gallery repeater.
 *
 * @param int $post_id Project ID.
 * @return array<string, mixed>|null ACF image array.
 */
function kj_project_first_image( $post_id ) {
	if ( ! function_exists( 'get_field' ) ) {
		return null;
	}

	$rows = get_field( 'project_images', $post_id );
	if ( empty( $rows[0]['afbeelding'] ) || ! is_array( $rows[0]['afbeelding'] ) ) {
		return null;
	}

	return $rows[0]['afbeelding'];
}
