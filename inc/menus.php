<?php
/**
 * Implement Navigation Menus.
 *
 * @link https://codex.wordpress.org/Navigation_Menus
 */

/**
 * Register theme locations.
 */
function cascade_menus() {
	register_nav_menu( 'primary', 'Navbar' );
	register_nav_menu( 'footer', 'Footer' );
	register_nav_menu( 'fine', 'Fine Print' );
}
add_action( 'after_setup_theme', 'cascade_menus' );