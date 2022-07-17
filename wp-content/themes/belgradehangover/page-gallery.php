<?php
    /* Template Name: Gallery */
    get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <section class="header animated fadeIn">

  			<div class="header__photo fullscreen background" data-img-height="1080" data-img-width="1920" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/gallery.jpg' ) ); ?>'); background-size: 1961.7px 1182px;" alt="<?php bloginfo( 'name' ); ?>"></div>
        <div id="container"></div>
        <div class="shadow-top"></div>
        <div class="shadow-bottom"></div>
        
            <div class="row page-intro">
                <div class="col-md-4">
                    <div class="lineTemplate lineTemplate-left animated animated-delay spreadRight">&nbsp;</div>
                </div>
                <div class="col-md-4 text-center text-uppercase">
                    <h1 class="display-1 animated animated-delay fadeIn">Gallery</h1>
                </div>
                <div class="col-md-4">
                    <div class="lineTemplate lineTemplate-right animated animated-delay spreadLeft">&nbsp;</div>
                </div>
            </div>
            <div class="arrow-down-normal"><i class="fal fa-chevron-down fa-lg hvr-sink" aria-hidden="true"></i></div>
  		</section>

            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
