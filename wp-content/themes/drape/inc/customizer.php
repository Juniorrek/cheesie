<?php
/**
 * Drape Theme Customizer
 *
 * @package drape
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function drape_customize_register( $wp_customize ) {
	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Load validation functions.
	require get_template_directory() . '/inc/customizer/validate.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'drape_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'drape_customize_partial_blogdescription',
		) );
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'Drape_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Drape_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Drape Pro', 'drape' ),
				'pro_text' => esc_html__( 'Buy Pro', 'drape' ),
				'pro_url'  => 'http://www.sharkthemes.com/downloads/drape-pro/',
				'priority'  => 10,
			)
		)
	);

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'drape_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','drape' ),
	    'description'=> esc_html__( 'Drape Theme Options.', 'drape' ),
	    'priority'   => 100,
	) );

	// slider settings
	require get_template_directory() . '/inc/customizer/slider-customizer.php';

	// footer settings
	require get_template_directory() . '/inc/customizer/footer-customizer.php';

	// latest blog settings
	require get_template_directory() . '/inc/customizer/latest-blog-customizer.php';
	
	// blog/archive settings
	require get_template_directory() . '/inc/customizer/blog-customizer.php';

	// single settings
	require get_template_directory() . '/inc/customizer/single-customizer.php';

	// page settings
	require get_template_directory() . '/inc/customizer/page-customizer.php';

	// global settings
	require get_template_directory() . '/inc/customizer/global-customizer.php';

}
add_action( 'customize_register', 'drape_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function drape_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function drape_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function drape_customize_preview_js() {
	wp_enqueue_script( 'drape-customizer', get_template_directory_uri() . '/assets/js/customizer' . drape_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'drape_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function drape_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . drape_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . drape_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// admin script
	wp_enqueue_style( 'drape-admin-style', get_template_directory_uri() . '/assets/css/admin' . drape_min() . '.css' );
	wp_enqueue_script( 'drape-admin-script', get_template_directory_uri() . '/assets/js/admin' . drape_min() . '.js', array( 'jquery', 'jquery-chosen' ), '1.0.0', true );

	wp_enqueue_style( 'drape-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . drape_min() . '.css' );
	wp_enqueue_script( 'drape-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls' . drape_min() . '.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'drape_customize_control_js' );
