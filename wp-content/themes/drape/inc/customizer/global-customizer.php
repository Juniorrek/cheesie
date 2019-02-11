<?php
/**
 * Global Customizer Options
 *
 * @package drape
 */

// Add Global section
$wp_customize->add_section( 'drape_global_section', array(
	'title'             => esc_html__( 'Global Setting','drape' ),
	'description'       => esc_html__( 'Global Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// site layout setting and control.
$wp_customize->add_setting( 'drape_theme_options[site_layout]', array(
	'sanitize_callback'   => 'drape_sanitize_select',
	'default'             => drape_theme_option('site_layout'),
) );

$wp_customize->add_control(  new Drape_Radio_Image_Control ( $wp_customize, 'drape_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'drape' ),
	'section'             => 'drape_global_section',
	'choices'			  => drape_site_layout(),
) ) );


// loader setting and control.
$wp_customize->add_setting( 'drape_theme_options[enable_loader]', array(
	'default'           => drape_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'drape' ),
	'section'           => 'drape_global_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'drape_theme_options[loader_type]', array(
	'default'          	=> drape_theme_option('loader_type'),
	'sanitize_callback' => 'drape_sanitize_select',
) );

$wp_customize->add_control( 'drape_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'drape' ),
	'section'           => 'drape_global_section',
	'type'				=> 'select',
	'choices'			=> drape_get_spinner_list(),
) );
