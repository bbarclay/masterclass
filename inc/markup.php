<?php
/**
 * Filters and actions to replace WordPress generated markup. Primarily HTML
 * classes.
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/body_class
 * @link https://codex.wordpress.org/Function_Reference/post_class
 */

/**
 * Additional body classes.
 */
function cascade_body_classes( $classes ) {
	// Add class for any page that isn't the homepage.
	if( ! is_front_page() ) {
		$classes[] = 'not-home';
	}

	// Add a class to all single views.
	if( is_singular() ) {
		$classes[] = 'singular';
	}

	// Add a class to all views of multiple posts.
	if( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	return $classes;
}
add_filter( 'body_class', 'cascade_body_classes' );

/**
 * Additional post classes.
 */
function cascade_post_classes( $classes, $class, $post_id ) {
	/*
	 * WooCommerce relies on default classes and shouldn't inherit any styles
	 * we apply to regular posts, so just return the default classes for
	 * products.
	 */
	if ( 'product' === get_post_type() ) {
		return $classes;
	}

	$classes = array();

	$classes[] = 'clearfix';

	$classes[] = 'entry';

	$classes[] = 'entry--' . get_post_type( $post_id );

	$classes[] = 'entry--' . get_the_ID( $post_id );

	$classes[] = 'is-' . get_post_status( $post_id );

	if ( is_sticky() ) {
		$classes[] = 'is-sticky';
	}

	if ( post_password_required() ) {
		$classes[] = 'is-password-protected';
	}

	if ( has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	$taxonomies = get_taxonomies( array( 'public' => true ) );

	foreach ( ( array ) $taxonomies as $taxonomy ) {
		if ( is_object_in_taxonomy( get_post_type( $post_id ), $taxonomy ) ) {
			foreach ( ( array ) get_the_terms( $post_id, $taxonomy ) as $term ) {
				if ( empty( $term->slug ) ) {
					continue;
				}

				$term_class = sanitize_html_class( $term->slug, $term->term_id );

				if ( is_numeric( $term_class ) || ! trim( $term_class, '-' ) ) {
					$term_class = $term->term_id;
				}

				$classes[] = 'has-' . sanitize_html_class( $taxonomy );
				$classes[] = 'has-' . sanitize_html_class( $taxonomy . '--' . $term_class, $taxonomy . '--' . $term->term_id );
			}
		}
	}

	$classes = array_merge( $classes, $class );

	$classes = array_map( 'esc_attr', $classes );

	return $classes;
}
add_filter( 'post_class', 'cascade_post_classes', 0, 3 );

/**
 * Replace menu classes with BEM set.
 */
function cascade_nav_menu_classes( $classes, $item, $args, $depth ) {
	$new_classes = array();

	if ( is_a( $args->walker, 'Cascade_Navbar_Walker' ) ) {
		// Navbar items.
		$new_classes[] = 'navbar__item';

		// Identify level with a CSS class.
		$new_classes[] = 'navbar__item--level-' . $depth;

		// Add specific class for sub-menu items.
		if ( $depth > 0 ) {
			$new_classes[] = 'dropdown__item';
			$new_classes[] = 'dropdown__item--level-' . ( $depth - 1 );
		}
	} else {
		// Regular menus.
		$new_classes[] = 'menu__item';

		// Identify level with a CSS class.
		$new_classes[] = 'menu__item--level-' . $depth;

		// Add specific class for sub-menu items.
		if ( $depth > 0 ) {
			$new_classes[] = 'sub-menu__item';
			$new_classes[] = 'sub-menu__item--level-' . ( $depth - 1 );
		}
	}

	// Rename current menu item class.
	if ( in_array( 'current-menu-item', $classes ) ) {
		$new_classes[] = 'is-current';
	}

	// Rename current menu parent class.
	if ( in_array( 'current-menu-ancestor' , $classes ) ) {
		$new_classes[] = 'is-ancestor';
	}

	// Rename current menu parent class.
	if ( in_array( 'current-menu-parent' , $classes ) ) {
		$new_classes[] = 'is-ancestor--parent';
	}

	// Rename has children class.
	if ( in_array( 'menu-item-has-children', $classes ) ) {
		$new_classes[] = 'has-children';
	}

	// Get user-defined classes.
	$custom_classes = get_post_meta( $item->ID, '_menu_item_classes', true );

	// Merge new classes and user-defined classes.
	$new_classes = array_merge( $new_classes, $custom_classes );

	return $new_classes;
}
add_filter( 'nav_menu_css_class', 'cascade_nav_menu_classes', 10, 4 );

/**
 * Custom Nav Menu walker for replacing sub-menu markup.
 *
 * @uses Walker_Nav_Menu
 */
class Cascade_Navbar_Walker extends Walker_Nav_Menu {
   /**
	* Starts the list before the elements are added.
	*
	* Extended to change the markup of sub-menus to use Cascade-specific classes.
	*
	* @see Walker_Nav_Menu::start_lvl()
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param int    $depth  Depth of menu item. Used for padding.
	* @param array  $args   An array of arguments. @see wp_nav_menu()
	*/
   function start_lvl( &$output, $depth = 0, $args = array() ) {
	   $indent = str_repeat( "\t", $depth );
	   $output .= "\n" . $indent . '<ul class="navbar__dropdown dropdown dropdown--level-' . $depth . '">' . "\n";
   }
}

/**
 * Remove navbar menu item IDs.
 */
function cascade_nav_menu_ids( $menu_id, $item, $args, $depth ) {
	if ( is_a( $args->walker, 'Cascade_Navbar_Walker' ) ) {
		$menu_id = false;
	}

	return $menu_id;
}
add_filter( 'nav_menu_item_id', 'cascade_nav_menu_ids', 10, 4);