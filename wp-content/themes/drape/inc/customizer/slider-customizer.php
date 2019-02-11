<?php
/**
 * Slider Customizer Options
 *
 * @package drape
 */

// Add slider section
$wp_customize->add_section( 'drape_slider_section', array(
	'title'             => esc_html__( 'Slider Section','drape' ),
	'description'       => esc_html__( 'Slider Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'drape_theme_options[enable_slider]', array(
	'default'           => drape_theme_option('enable_slider'),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'drape' ),
	'section'           => 'drape_slider_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'drape_theme_options[slider_entire_site]', array(
	'default'           => drape_theme_option('slider_entire_site'),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show Entire Site', 'drape' ),
	'section'           => 'drape_slider_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'drape_theme_options[slider_arrow]', array(
	'default'           => drape_theme_option('slider_arrow'),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'drape' ),
	'section'           => 'drape_slider_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'drape_theme_options[slider_btn_label]', array(
	'default'          	=> drape_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'drape_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'drape' ),
	'section'           => 'drape_slider_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'drape_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'drape_sanitize_page_post',
	) );

	$wp_customize->add_control( new Drape_Dropdown_Chosen_Control( $wp_customize, 'drape_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'drape' ), $i ),
		'section'           => 'drape_slider_section',
		'choices'			=> drape_page_choices(),
	) ) );

endfor;