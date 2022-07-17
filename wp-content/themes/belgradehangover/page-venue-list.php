<?php
    /* Template Name: Venue List */
    get_header();

    $slug = basename(get_permalink());

    $venues = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => $slug,
        'post_status' => 'publish'
    ));
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main animated fadeIn" role="main">

            <div class="nightClubAllList venues">
                <?php
                    while ($venues->have_posts()) {
                        $venues->the_post(); ?>
                        <div class="venue">
                            <a class="venueBlock" href="<?php echo get_post_permalink(); ?>">
                                <div class="venueFeaturedList">
                                  <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" />
                                </div>
                            </a>
                            <a class="venueTitle" href="<?php echo get_post_permalink(); ?>">
                              <div class="redCircle"></div>  <?php echo get_the_title(); ?> <div class="redCircle"></div>
                            </a>
                        </div>
                <?php
                    }
                    wp_reset_query();
                ?>
            </div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
