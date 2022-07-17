<?php
    /* Template Name: Tours List */
    get_header();

    $tours = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'tours',
        'post_status' => 'publish'
    ));
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main animated fadeIn" role="main">

        <div class="container-fluid">
            <h2 class="display-4 page-heading"><i class="fal fa-camera-retro fa-2x" data-fa-transform="down-6"></i> Tours</h2>
            <p class="lead text-center text-uppercase" style="margin-left: 22rem;"><strong>The best places to take photo in Belgrade</strong></p>
            <div class="card-deck row listing">
            <?php
                while ($tours->have_posts()) {
                    $tours->the_post(); ?>

                    <div class="col-md-6 col-8 mx-auto">
                      <a class="venueBlock" href="<?php echo get_post_permalink(); ?>">
                      <div class="card event-card tours">
                        <div class="red-logo"><img src="/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
                          <div class="red-borders">
                            <span></span>
                          </div>
                          <div class="event-pict">
                            <img class="img-fluid" src="<?php echo the_post_thumbnail_url(); ?>" alt="" />
                          </div>
                         <div class="card-body">
                           <h3 class="card-title text-center"><?php echo get_the_title(); ?></h3>
                           <p>
                              <?php echo get_field('tour_info');?>
                            </p>
                         </div>
                         <div class="pichold">
                             <i class="fal fa-camera-alt fa-5x"></i>
                         </div>
                       </div>
                       </a>
                    </div>
            <?php
                }
                wp_reset_query();
            ?>
        </div>
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

?>
