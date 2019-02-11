<?php
/**
 * Options functions
 *
 * @package drape
 */

if ( ! function_exists( 'drape_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function drape_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'drape' ),
            'off'       => esc_html__( 'No', 'drape' )
        );
        return apply_filters( 'drape_show_options', $arr );
    }
endif;

if ( ! function_exists( 'drape_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function drape_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'drape' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'drape_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function drape_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'drape' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'drape_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function drape_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'drape' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'drape_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function drape_site_layout() {
        $drape_site_layout = array(
            'full'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'boxed'   => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'drape_site_layout', $drape_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'drape_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function drape_sidebar_position() {
        $drape_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/uploads/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/uploads/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/uploads/full.png',
        );

        $output = apply_filters( 'drape_sidebar_position', $drape_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'drape_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function drape_get_spinner_list() {
        $arr = array(
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'drape' ),
            'spinner-dots'          => esc_html__( 'Dots', 'drape' ),
        );
        return apply_filters( 'drape_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'drape_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function drape_selected_sidebar() {
        $drape_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'drape' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'drape' ),
        );

        $output = apply_filters( 'drape_selected_sidebar', $drape_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'drape_header_typography' ) ) :
    /**
     * header typography options
     * @return array header typography
     */
    function drape_header_typography() {
        $drape_header_typography = array(
            'default'              => esc_html__( 'Default', 'drape' ),
            'header-font-1'             => esc_html__( 'Rajdhani', 'drape' ),
            'header-font-2'             => esc_html__( 'Roboto', 'drape' ),
            'header-font-3'             => esc_html__( 'Philosopher', 'drape' ),
            'header-font-4'             => esc_html__( 'Slabo 27px', 'drape' ),
            'header-font-5'             => esc_html__( 'Dosis', 'drape' ),
        );

        $output = apply_filters( 'drape_header_typography', $drape_header_typography );

        return $output;
    }
endif;

if ( ! function_exists( 'drape_body_typography' ) ) :
    /**
     * body typography options
     * @return array body typography
     */
    function drape_body_typography() {
        $drape_body_typography = array(
            'default'            => esc_html__( 'Default', 'drape' ),
            'body-font-1'             => esc_html__( 'News Cycle', 'drape' ),
            'body-font-2'             => esc_html__( 'Pontano Sans', 'drape' ),
            'body-font-3'             => esc_html__( 'Gudea', 'drape' ),
            'body-font-4'             => esc_html__( 'Quattrocento', 'drape' ),
            'body-font-5'             => esc_html__( 'Khand', 'drape' ),
        );

        $output = apply_filters( 'drape_body_typography', $drape_body_typography );

        return $output;
    }
endif;
