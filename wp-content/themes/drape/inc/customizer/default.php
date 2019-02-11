<?php
/**
 * Default Theme Customizer Values
 *
 * @package drape
 */

function drape_get_default_theme_options() {
	$drape_default_options = array(
		// default options

		// Slider
		'enable_slider'			=> true,
		'slider_entire_site'	=> false,
		'slider_arrow'			=> true,

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2018 | All Rights Reserved.', 'drape' ),

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Latest Blogs', 'drape' ),
		'excerpt_count'			=> 15,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> false,
		'loader_type'			=> 'spinner-dots',
		'site_layout'			=> 'full',

	);

	$output = apply_filters( 'drape_default_theme_options', $drape_default_options );
	return $output;
}