<?php
/**
 * Page Customizer Options
 *
 * @package drape
 */

// Add excerpt section
$wp_customize->add_section( 'drape_page_section', array(
	'title'             => esc_html__( 'Page Setting','drape' ),
	'description'       => esc_html__( 'Page Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'drape_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'drape_sanitize_select',
	'default'             => drape_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new Drape_Radio_Image_Control ( $wp_customize, 'drape_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'drape' ),
	'section'             => 'drape_page_section',
	'choices'			  => drape_sidebar_position(),
) ) );
