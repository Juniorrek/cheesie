<?php
/**
 * Footer Customizer Options
 *
 * @package drape
 */

// Add footer section
$wp_customize->add_section( 'drape_footer_section', array(
	'title'             => esc_html__( 'Footer Section','drape' ),
	'description'       => esc_html__( 'Footer Setting Options', 'drape' ),
	'panel'             => 'drape_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'drape_theme_options[slide_to_top]', array(
	'default'           => drape_theme_option('slide_to_top'),
	'sanitize_callback' => 'drape_sanitize_switch',
) );

$wp_customize->add_control( new Drape_Switch_Control( $wp_customize, 'drape_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'drape' ),
	'section'           => 'drape_footer_section',
	'on_off_label' 		=> drape_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'drape_theme_options[copyright_text]',
	array(
		'default'       		=> drape_theme_option('copyright_text'),
		'sanitize_callback'		=> 'drape_santize_allow_tags',
	)
);
$wp_customize->add_control( 'drape_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'drape' ),
		'section'    			=> 'drape_footer_section',
		'type'		 			=> 'textarea',
    )
);
