<?php
/**
 * Cascade functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 */

define( 'CASCADE_GOOGLE_FONTS_URL', 'https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i|Shadows+Into+Light:400' );
define( 'CASCADE_CONTENT_WIDTH', 1050 );
define( 'CASCADE_EXCERPT_LENGTH', 25 );

include( 'inc/algolia.php' ); // Algolia plugin support
include( 'inc/assets.php' ); // Enqueue scripts and styles.
include( 'inc/content.php' ); // Functions for filtering content and excerpts..
include( 'inc/customizer.php' ); // Add customizer settings and controls.
include( 'inc/images.php' ); // Add image sizes.
include( 'inc/markup.php' ); // Functions to filter WordPress generated markup.
include( 'inc/menus.php' ); // Register nav menus.
include( 'inc/setup.php' ); // Theme setup and activation.
include( 'inc/template-tags.php' ); // Functions for use in templates.
include( 'inc/widget-areas.php' ); // Register widget areas.

