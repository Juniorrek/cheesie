<?php
/**
 * Theme functions and definitions
 *
 * @package drape_shade
 */ 

if ( ! function_exists( 'drape_shade_posts_wrapper_column' ) ) :
	/**
	 * Customize posts wrapper column.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Theme defaults.
	 * @param array Custom theme defaults.
	 */
	function drape_shade_posts_wrapper_column( $defaults ) {
		return 'column-2';
	}
endif;
add_filter( 'drape_posts_wrapper_column_filter', 'drape_shade_posts_wrapper_column', 99 );

if ( ! function_exists( 'drape_shade_slider_slidestoshow' ) ) :
    /**
     * Customize slider slides to show.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function drape_shade_slider_slidestoshow( $defaults ) {
        return 2;
    }
endif;
add_filter( 'drape_slider_slidestoshow_filter', 'drape_shade_slider_slidestoshow', 99 );

if ( ! function_exists( 'drape_shade_slider_fade' ) ) :
    /**
     * Customize slider fade.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function drape_shade_slider_fade( $defaults ) {
        return 'false';
    }
endif;
add_filter( 'drape_slider_fade_filter', 'drape_shade_slider_fade', 99 );

if ( ! function_exists( 'drape_shade_slider_image_size' ) ) :
    /**
     * Customize slider image size.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function drape_shade_slider_image_size( $defaults ) {
        return 'post-thumbnail';
    }
endif;
add_filter( 'drape_slider_image_size_filter', 'drape_shade_slider_image_size', 99 );

if ( ! function_exists( 'drape_shade_fonts_url' ) ) :
	/**
	 * Register Google fonts
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function drape_shade_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'drape-shade' ) ) {
			$fonts[] = 'Playfair Display:200,300,400,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		);

		if ( $fonts ) {
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since Drape Pro 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function drape_shade_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'drape-shade-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'drape_shade_resource_hints', 10, 2 );

if ( ! function_exists( 'drape_shade_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function drape_shade_enqueue_styles() {

		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'drape-shade-fonts', drape_shade_fonts_url(), array(), null );

		wp_enqueue_style( 'drape-shade-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'drape-shade-style', get_stylesheet_directory_uri() . '/style.css', array( 'drape-shade-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'drape_shade_enqueue_styles', 99 );

