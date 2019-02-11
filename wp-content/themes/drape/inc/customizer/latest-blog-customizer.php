<?php
/**
 * latest blog Customizer Options
 *
 * @package drape
 */

// Add blog section
$wp_customize->add_section( 'drape_latest_blog_section', array(
	'title'             => esc_html__( 'Latest Blog Page Setting','drape' ),
	'description'       => esc_html__( 'Latest Blog Page Page Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'drape_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> drape_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( 'drape_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'drape' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'drape' ),
	'section'           => 'drape_latest_blog_section',
	'type'				=> 'text',
) );
