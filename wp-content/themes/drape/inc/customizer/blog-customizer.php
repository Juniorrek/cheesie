<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package drape
 */

// Add blog section
$wp_customize->add_section( 'drape_blog_section', array(
	'title'             => esc_html__( 'Archive Page Setting','drape' ),
	'description'       => esc_html__( 'Archive/Search Page Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'drape_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'drape_sanitize_select',
	'default'             => drape_theme_option('sidebar_layout'),
) );

$wp_customize->add_control(  new Drape_Radio_Image_Control ( $wp_customize, 'drape_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'drape' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'drape' ),
	'section'             => 'drape_blog_section',
	'choices'			  => drape_sidebar_position(),
) ) );

// excerpt count control and setting
$wp_customize->add_setting( 'drape_theme_options[excerpt_count]', array(
	'default'          	=> drape_theme_option('excerpt_count'),
	'sanitize_callback' => 'drape_sanitize_number_range',
	'validate_callback' => 'drape_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'drape_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'drape' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'drape' ),
	'section'           => 'drape_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'drape_theme_options[pagination_type]', array(
	'default'          	=> drape_theme_option('pagination_type'),
	'sanitize_callback' => 'drape_sanitize_select',
) );

$wp_customize->add_control( 'drape_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'drape' ),
	'section'           => 'drape_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'drape' ),
		'numeric' 		=> esc_html__( 'Numeric', 'drape' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_date]', array(
	'default'           => drape_theme_option( 'show_date' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'drape' ),
	'section'           => 'drape_blog_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_category]', array(
	'default'           => drape_theme_option( 'show_category' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'drape' ),
	'section'           => 'drape_blog_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_author]', array(
	'default'           => drape_theme_option( 'show_author' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'drape' ),
	'section'           => 'drape_blog_section',
	'on_off_label' 		=> drape_show_options(),
) ) );
