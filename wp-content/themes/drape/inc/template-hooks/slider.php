<?php
/**
 * Slider hook
 *
 * @package drape
 */

if ( ! function_exists( 'drape_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Drape 1.0.0
    */
    function drape_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'drape_section_status', 'enable_slider', 'slider_entire_site' );

        if ( ! $slider_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'drape_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        drape_render_slider_section( $section_details );
    }
endif;
add_action( 'drape_primary_content_action', 'drape_add_slider_section', 10 );


if ( ! function_exists( 'drape_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Drape 1.0.0
    * @param array $input slider section details.
    */
    function drape_get_slider_section_details( $input ) {

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ )  :
            $page_ids[] = drape_theme_option( 'slider_content_page_' . $i );
        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), apply_filters( 'drape_slider_image_size_filter', 'full' ) ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// slider section content details.
add_filter( 'drape_filter_slider_section_details', 'drape_get_slider_section_details' );


if ( ! function_exists( 'drape_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Drape 1.0.0
   *
   */
   function drape_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $slider_control = drape_theme_option( 'slider_arrow' );
        $readmore = drape_theme_option( 'slider_btn_label', esc_html__( 'Read Blog', 'drape' ) );
        ?>
    	<div id="custom-header">
            <div class="wrapper">
                <div class="section-content banner-slider" data-slick='{"slidesToShow": <?php echo apply_filters( 'drape_slider_slidestoshow_filter', 1 ); ?>, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": true, "fade": <?php echo apply_filters( 'drape_slider_fade_filter', 'true' ); ?>, "draggable": true }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <div class="custom-header-content-wrapper slide-item">
                            <div class="overlay"></div>
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                            <?php endif; ?>
                            <div class="custom-header-content">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif; 

                                if ( ! empty( $content['url'] ) && ! empty( $readmore ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                                <?php endif; ?>
                            </div><!-- .custom-header-content -->
                        </div><!-- .custom-header-content-wrapper -->
                    <?php endforeach; ?>
                </div><!-- .banner-slider -->
            </div><!-- .wrapper -->
        </div><!-- #custom-header -->
    <?php 
    }
endif;