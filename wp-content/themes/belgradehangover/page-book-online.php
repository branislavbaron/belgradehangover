<?php
    /* Template Name: Book Online */
    get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main animated fadeIn" role="main">
      <div class="booknowImage"><img src="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/home/booknow.png' ) ); ?>"></div>   
      <div class="book__tab">
        <button id="nightclub" class="hvr-shutter-in-horizontal">Nightclub</button>
        <button id="restaurant" class="hvr-shutter-in-horizontal">Restaurant</button>
        <button id="citytour" class="hvr-shutter-in-horizontal">City Tour</button>

      </div>
			<?php
                echo do_shortcode('[ninja_form id=3]');
                echo do_shortcode('[ninja_form id=4]');
                echo do_shortcode('[ninja_form id=5]');

			// while ( have_posts() ) : the_post();
            //
			// 	get_template_part( 'template-parts/content', 'page' );
            //
			// 	// If comments are open or we have at least one comment, load up the comment template.
			// 	if ( comments_open() || get_comments_number() ) :
			// 		comments_template();
			// 	endif;
            //
			// endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
