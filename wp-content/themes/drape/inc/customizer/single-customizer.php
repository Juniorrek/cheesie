<?php
/**
 * Single Post Customizer Options
 *
 * @package drape
 */

// Add excerpt section
$wp_customize->add_section( 'drape_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','drape' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'drape_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'drape_sanitize_select',
	'default'             => drape_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new Drape_Radio_Image_Control ( $wp_customize, 'drape_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'drape' ),
	'section'             => 'drape_single_section',
	'choices'			  => drape_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_single_date]', array(
	'default'           => drape_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'drape' ),
	'section'           => 'drape_single_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_single_category]', array(
	'default'           => drape_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'drape' ),
	'section'           => 'drape_single_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_single_tags]', array(
	'default'           => drape_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'drape' ),
	'section'           => 'drape_single_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'drape_theme_options[show_single_author]', array(
	'default'           => drape_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'drape' ),
	'section'           => 'drape_single_section',
	'on_off_label' 		=> drape_show_options(),
) ) );
