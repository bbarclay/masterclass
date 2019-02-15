<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cascade_setup() {
	global $content_width;
	$content_width = CASCADE_CONTENT_WIDTH;

	// This theme supports the Title Tag.
	add_theme_support( 'title-tag' );

	// This theme supports HTML5 for comments, images, and galleries.
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'caption', 'gallery' ) );

	// This theme supports manual excerpts for Pages.
	add_post_type_support( 'page', 'excerpt' );

	// This theme supports Post Thumbnails.
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'cascade_setup' );

/**
 * Set Advanced Custom Fields path.
 */
function cascade_acf_settings_path( $path ) {
	$path = get_template_directory() . '/lib/acf/';

	return $path;
}
add_filter( 'acf/settings/path', 'cascade_acf_settings_path' );

/**
 * Set Advanced Custom Fields directory.
 */
function cascade_acf_settings_dir( $dir ) {
	$dir = get_template_directory_uri() . '/lib/acf/';

	return $dir;
}
add_filter( 'acf/settings/dir', 'cascade_acf_settings_dir' );

/**
 * Include Advanced Custom Fields.
 */
include_once( get_template_directory() . '/lib/acf/acf.php' );

/**
 * On activation, create starting custom fields.
 *
 * This function creates a Field Group for the Front Page Template, which
 * comprises a Flexible Content field to which the developer will add Layouts.
 *
 * The function also creates a Content Layout in the Blocks Field Group that
 * contains a Title (Text) and Content (WYSIWYG) field. The template part for
 * this layout is bundled in templates-parts/modules and some default styling is
 * in less/components/module.less.
 */
function cascade_insert_field_group() {
	if ( ! get_option( 'cascade_field_group' ) ) {
		$group = wp_insert_post( array(
			'post_title'   => 'Modules',
			'post_excerpt' => 'modules',
			'post_type'    => 'acf-field-group',
			'post_status'  => 'publish',
			'post_content' => serialize( array(
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => array( 'the_content' ),
				'description'           => '',
				'location'              => array(
					0 => array(
						0 => array(
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'page-templates/template-modules.php',
						),
					),
				),
			) ),
		) );

		if ( $group ) {
			add_option( 'cascade_field_group', $group );

			$layout_key = uniqid();

			$field = wp_insert_post( array(
				'post_parent'  => $group,
				'post_title'   => 'Modules',
				'post_excerpt' => 'modules',
				'post_type'    => 'acf-field',
				'post_status'  => 'publish',
				'post_content' =>  serialize( array(
					'type'              => 'flexible_content',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'button_label' => 'Add Module',
					'min'          => '',
					'max'          => '',
					'layouts'      => array(
						array(
							'key'     => $layout_key,
							'label'   => 'Text',
							'name'    => 'text',
							'display' => 'row',
							'min'     => '',
							'max'     => '',
						),
					),
				) ),
			) );

			wp_insert_post( array(
				'post_parent'  => $field,
				'post_title'   => 'Title',
				'post_excerpt' => 'title',
				'post_type'    => 'acf-field',
				'post_status'  => 'publish',
				'post_content' =>  serialize( array(
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'parent_layout'     => $layout_key,
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
					'readonly'          => 0,
					'disabled'          => 0,
				) ),
			) );

			wp_insert_post( array(
				'post_parent'  => $field,
				'post_title'   => 'Content',
				'post_excerpt' => 'content',
				'post_type'    => 'acf-field',
				'post_status'  => 'publish',
				'post_content' =>  serialize( array(
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           =>
					array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'parent_layout'     => $layout_key,
					'default_value'     => '',
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 1,
				) ),
				'menu_order'   => 1,
			) );
		}
	}
}
add_action( 'after_switch_theme', 'cascade_insert_field_group' );
