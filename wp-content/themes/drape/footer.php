<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drape
 */

/**
 * drape_site_content_ends_action hook
 *
 * @hooked drape_site_content_ends -  10
 *
 */
do_action( 'drape_site_content_ends_action' );

/**
 * drape_footer_start_action hook
 *
 * @hooked drape_footer_start -  10
 *
 */
do_action( 'drape_footer_start_action' );

/**
 * drape_site_info_action hook
 *
 * @hooked drape_site_info -  10
 *
 */
do_action( 'drape_site_info_action' );

/**
 * drape_footer_ends_action hook
 *
 * @hooked drape_footer_ends -  10
 * @hooked drape_slide_to_top -  20
 *
 */
do_action( 'drape_footer_ends_action' );

/**
 * drape_page_ends_action hook
 *
 * @hooked drape_page_ends -  10
 *
 */
do_action( 'drape_page_ends_action' );

wp_footer();

/**
 * drape_body_html_ends_action hook
 *
 * @hooked drape_body_html_ends -  10
 *
 */
do_action( 'drape_body_html_ends_action' );
