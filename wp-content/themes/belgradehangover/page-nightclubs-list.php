<?php
    /* Template Name: Nightclubs List */
    get_header();

    $nightclubs = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'nightclubs',
        'post_status' => 'publish'
    ));
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main animated fadeIn" role="main">

            <div class="container-fluid">
                  <h2 class="display-4 page-heading"><i class="fal fa-glass-martini fa-2x" data-fa-transform="down-5"></i> Nightclubs</h2>
                  <p class="lead text-center text-uppercase" style="margin-left: 2rem;"><strong>The best nightclubs in Belgrade</strong></p>
                <div class="card-deck row listing">
                <?php
                    while ($nightclubs->have_posts()) {
                        $nightclubs->the_post(); ?>
                      <div class="col-md-4 col-12">
                        <a class="venueBlock" href="<?php echo get_post_permalink(); ?>">
                        <div class="card event-card clubs">
                          <div class="red-logo"><img src="/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
                            <div class="red-borders">
                              <span></span>
                            </div>
                            <div class="event-pict">
                              <img class="img-fluid" src="<?php echo the_post_thumbnail_url(); ?>" alt="" />
                            </div>
                           <div class="card-body">
                             <h3 class="card-title text-center"><?php echo get_the_title(); ?></h3>
                             <p class="card-text text-center lead"><i class="far fa-music"></i> <strong>Music: </strong><?php echo get_field('music'); ?></p>
                             <p class="card-text text-center lead"><i class="far fa-clock"></i> <strong>Work Hours: </strong><?php echo get_field('work_hours'); ?></p>
                           </div>
                           <div class="card-footer text-center">
                             <p class="text-white lead"><i class="far fa-map-marker-alt"></i> <?php echo get_field('address'); ?></p>
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
