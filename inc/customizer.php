<?php
/**
 * Integra Elements Theme Customizer
 *
 * @package Integra_Elements
 */

 /**
 * Add theme version field to the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function integra_elements_customize_theme_version( $wp_customize ) {
	// Add Theme Version Section
	$wp_customize->add_section('integra_theme_version_section', array(
		'title' => __('Theme Version', 'integra-elements'),
		'priority' => 120,
	));
	
	// Add Theme Version Setting
	$wp_customize->add_setting('integra_theme_version', array(
		'default' => '1.0.0',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	// Add Theme Version Control
	$wp_customize->add_control('integra_theme_version', array(
		'label' => __('Theme Version Number', 'integra-elements'),
		'description' => __('Enter the current theme version number (e.g. 1.0.1)', 'integra-elements'),
		'section' => 'integra_theme_version_section',
		'type' => 'text',
	));
}
add_action('customize_register', 'integra_elements_customize_theme_version');


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function integra_elements_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// Add selective refresh support for site title and description.
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'integra_elements_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'integra_elements_customize_partial_blogdescription',
			)
		);
	}

	// Add Theme Version Section
    $wp_customize->add_section('integra_theme_version_section', array(
        'title' => __('Theme Version', 'integra-elements'),
        'priority' => 120,
    ));
    
    // Add Theme Version Setting
    $wp_customize->add_setting('integra_theme_version', array(
        'default' => '1.0.0',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    // Add Theme Version Control
    $wp_customize->add_control('integra_theme_version', array(
        'label' => __('Theme Version Number', 'integra-elements'),
        'description' => __('Enter the current theme version number (e.g. 1.0.1)', 'integra-elements'),
        'section' => 'integra_theme_version_section',
        'type' => 'text',
    ));
}
add_action( 'customize_register', 'integra_elements_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function integra_elements_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function integra_elements_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function integra_elements_customize_preview_js() {
	wp_enqueue_script( 'integra-elements-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'integra_elements_customize_preview_js' );

