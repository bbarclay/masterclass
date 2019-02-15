<?php
/**
 * Functions that filter the content and excerpts.
 */

/**
 * Custom excerpt more string.
 */
function cascade_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'cascade_excerpt_more' );

/**
 * Custom excerpt length.
 */
function cascade_excerpt_length() {
	return CASCADE_EXCERPT_LENGTH;
}
add_filter( 'excerpt_length', 'cascade_excerpt_length' );

/**
 * Add pagination links to content.
 */
function cascade_content_link_pages( $content ) {
	if ( ! is_single() ) {
		return $content;
	}

	ob_start();

	wp_link_pages( array(
		'before'      => '<nav class="pagination">',
		'after'       => '</nav>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );

	$content .= ob_get_clean();

	return $content;
}
add_filter( 'the_content', 'cascade_content_link_pages', 5 );