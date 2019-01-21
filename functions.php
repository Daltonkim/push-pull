<?php
/**
 * push-pull Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package push-pull
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_PUSH_PULL_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'push-pull-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_PUSH_PULL_VERSION, 'all' );
	wp_enqueue_script( 'push-pull-js', get_stylesheet_directory_uri() . '/node_modules/gsap/src/minified/TweenLite.min.js', array('astra-theme-js'), CHILD_THEME_PUSH_PULL_VERSION, 'all' );
   
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function andrew_loop_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'parent' => 8,
        'type' => 'page',
        'perpage' => 4
	), $atts ) );
	query_posts( 'cat=news' );
                  if (have_posts()) :
                    while (have_posts()) : the_post();

                  ?>
<div class="stories">
    <header class="stories__header">
		<h2 class="stories__header__heading heading--section"><em>FARMER</em> STORIES</h2>
	</header>
	<div class="stories__container">
		<div class="stories__item">
			<a href="/blog/why-one-acre-fund-farmers-are-excited-about-trees/" class="stories__item__link">

				<div class="stories__item__image-container">
					<div class="stories__item__action">
						<span class="stories__item__action__btn btn--secondary">Learn more</span>
					</div>
					<img alt="Davis &amp; Emelda Mukolwe" class="stories__item__image" height="300" src="http://astra.local/wp-content/uploads/2019/01/4-1024x768.jpg"
						width="924">
				</div> <!-- /stories__image-container -->

				<div class="stories__item__content">
					<h2 class="stories__item__heading"><?php the_title(); ?></h2>
					<p class="stories__item__tags"><?php the_category(' '); ?></p>
					<?php the_tags('Tags:', ', '); ?>
					<p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> </p>

				</div> <!-- /stories__content -->

			</a>
	</div>
</div>
                
                  <?php
                  endwhile;
                  else :
                  ?>
                  <p>They are no posts yet</p>
                  <?php 

				  endif;
				  

 wp_reset_query(); 

    
}
add_shortcode('andrewloop', 'andrew_loop_shortcode');