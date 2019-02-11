<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drape
 */

/**
 * drape_doctype_action hook
 *
 * @hooked drape_doctype -  10
 *
 */
do_action( 'drape_doctype_action' );

/**
 * drape_head_action hook
 *
 * @hooked drape_head -  10
 *
 */
do_action( 'drape_head_action' );

/**
 * drape_body_start_action hook
 *
 * @hooked drape_body_start -  10
 *
 */
do_action( 'drape_body_start_action' );
 
/**
 * drape_page_start_action hook
 *
 * @hooked drape_page_start -  10
 * @hooked drape_loader -  20
 *
 */
do_action( 'drape_page_start_action' );

/**
 * drape_header_start_action hook
 *
 * @hooked drape_header_start -  10
 *
 */
do_action( 'drape_header_start_action' );

/**
 * drape_site_branding_action hook
 *
 * @hooked drape_site_branding -  10
 *
 */
do_action( 'drape_site_branding_action' );

/**
 * drape_primary_nav_action hook
 *
 * @hooked drape_primary_nav -  10
 *
 */
do_action( 'drape_primary_nav_action' );

/**
 * drape_header_ends_action hook
 *
 * @hooked drape_header_ends -  10
 *
 */
do_action( 'drape_header_ends_action' );

/**
 * drape_site_content_start_action hook
 *
 * @hooked drape_site_content_start -  10
 *
 */
do_action( 'drape_site_content_start_action' );

/**
 * drape_primary_content_action hook
 *
 * @hooked drape_add_slider_section -  10
 *
 */
do_action( 'drape_primary_content_action' );