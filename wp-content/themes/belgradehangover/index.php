<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package belgradehangover
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="header header-normal animated fadeIn">
				<div class="header__photo fullscreen background" data-img-height="1080" data-img-width="1920" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/blog-main.jpg' ) ); ?>'); background-size: 1961.7px 1182px;" alt="<?php bloginfo( 'name' ); ?>"></div>

            <div class="row page-intro">
                <div class="col-md-4">
                    <div class="lineTemplate lineTemplate-left animated animated-delay spreadRight">&nbsp;</div>
                </div>
                <div class="col-md-4 text-center text-uppercase">
                    <h1 class="display-1 animated animated-delay fadeIn">Blog</h1>
                </div>
                <div class="col-md-4">
                    <div class="lineTemplate lineTemplate-right animated animated-delay spreadLeft">&nbsp;</div>
                </div>
            </div>
            <div class="arrow-down-normal"><i class="fal fa-chevron-down fa-lg hvr-sink" aria-hidden="true"></i></div>
			</section>

		<div class="contentPage latestArticles__list latestArticles__listMain">
		<?php
		if ( have_posts() ) : ?>

			<h2>Learn all about Belgrade: Read our Blog</h2>
			<div class="line"></div>
		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			echo '<div class="pages">';
  			echo '<ul class="pagination">';
    		echo '<li class="page-item">';
    		echo next_posts_link();
  			echo '</li>';
  			echo '<li class="page-item">';
  			echo previous_posts_link();
  			echo '</li>';
  			echo ' </ul>';
			echo '</div>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
