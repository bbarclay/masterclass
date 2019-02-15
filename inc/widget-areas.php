<?php
/**
 * Implement sidebars/widget areas.
 *
 * @link http://codex.wordpress.org/Sidebars
 *
 * @package Cascade
 * @since 1.0
 */

/**
 * Register widget areas.
 *
 * @since 1.0
 */
function cascade_register_widgets() {
	/**
	 * Register footer columns,
	 */
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header class="widget__header"><h1 class="widget__title">',
		'after_title'   => '</h1></header>',
	) );
}
add_action( 'widgets_init', 'cascade_register_widgets' );