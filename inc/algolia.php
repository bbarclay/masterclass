<?php

/**
 * Dequeue default Algolia styles.
 */
function cascade_dequeue_algolia_styles() {
	wp_enqueue_script( 'cascade-search', get_template_directory_uri() . '/js/search.js', array( 'algolia-instantsearch', 'jquery' ), false, true );
	wp_dequeue_style( 'algolia-instantsearch' );
}
add_action( 'wp_enqueue_scripts', 'cascade_dequeue_algolia_styles', 99 );
