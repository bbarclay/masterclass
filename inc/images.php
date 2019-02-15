<?php
/**
 * Define image sizes for use in the theme.
 */
function cascade_image_sizes() {
	set_post_thumbnail_size( 640, 360, true );
}
add_action( 'after_setup_theme', 'cascade_image_sizes' );