<?php
/**
 * Implement Customizer.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 */

/**
 * Add Customizer settings and controls.
 */
function cascade_customizer( $wp_customize ) {
	$wp_customize->add_section( 'header' , array(
		'title'    => 'Header',
		'priority' => 105,
	) );

	$wp_customize->add_setting( 'login_url' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'login_url', array(
		'label'    => 'Log in URL',
		'type'     => 'text',
		'section'  => 'header',
		'input_attrs' => array(
			'placeholder' => 'http://',
		)
	) ) );


	$wp_customize->add_section( 'footer' , array(
		'title'    => 'Footer',
		'priority' => 110,
	) );

	$wp_customize->add_setting( 'footer_tagline' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_tagline', array(
		'label'    => 'Tagline',
		'type'     => 'text',
		'section'  => 'footer',
	) ) );
}
add_action( 'customize_register', 'cascade_customizer' );