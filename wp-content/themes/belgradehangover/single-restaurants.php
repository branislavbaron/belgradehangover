<?php
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>

		<section class="header header-normal about animated fadeIn">
			<div class="shadow-top"></div>
			<div class="shadow-bottom"></div>
			<div class="header__photo fullscreen background" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>); background-size: 1961.7px 1182px;" data-img-height="1080" data-img-width="1920">&nbsp;</div>
            <div class="row page-intro">
                <div class="col-md-4">
                    <div class="lineTemplate lineTemplate-left animated animated-delay spreadRight">&nbsp;</div>
                </div>
                <div class="col-md-4 text-center text-uppercase">
                    <h1 class="display-1 animated animated-delay fadeIn"><?php the_title(); ?></h1>
                </div>
                <div class="col-md-4">
                    <div class="lineTemplate lineTemplate-right animated animated-delay spreadLeft">&nbsp;</div>
                </div>
            </div>
					<div class="venueDetails">
									<ul class="list-inline">
											<li class="list-inline-item"><i class="fal fa-map-marker-alt fa-lg"></i> Address: <?php echo get_field('address'); ?> | </li>
											<li class="list-inline-item"><i class="fal fa-utensils fa-lg"></i> Cuisine: <?php echo get_field('cuisine'); ?></li>
									</ul>
							</div>
		</section>
		<div class="arrow-down-normal"><i class="fal fa-chevron-down fa-lg hvr-sink" aria-hidden="true"></i></div>

		<div class="contentPage singleRestaurantPage">
			<h2 class="display-3"><i class="fal fa-hashtag fa-lg"></i><div class="line-l"></div> <?php the_title(); ?></h2>
				
			<div class="row">
				<div class="col-md-9">
						<p class="lead">
							<?php
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'belgradehangover' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
							?>
						</p>
				</div>
				<div class="col-md-3">
					<img src="<?php echo get_field('restaurant_logo'); ?>" class="img-thumbnail" alt="<?php the_title(); ?>" />
				</div>
			</div>
			<div class="call mt-4">
				<div class="call__item"><a href='tel:+381 63 1234 567'>call us now</a><span class="mask"></span></div>
				<div class="call__item"><a href='/book-online'>BOOK ONLINE</a><span class="mask"></span></div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="restaurants-gallery"><i class="fal fa-camera-retro fa-lg"></i> &nbsp; <?php the_title(); ?>'s Gallery</h2>
				</div>
			</div>
			<div class="venueGallery">
				<?php echo do_shortcode(get_field('restaurant_gallery')); ?>
				<a href='<?php echo esc_url( home_url( '/photo-store' ) ); ?>' class='btn btn btn-outline-danger btn-block btn-lg btn-photos'>Get PRO photos of yourself in best quality! <i class="fal fa-cloud-download fa-lg"></i></a>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="restaurants-gallery"><i class="fal fa-map fa-lg"></i>&nbsp; <?php the_title(); ?>'s Location</h2>
					<?php 

					$location = get_field('google_maps');

					if( !empty($location) ):
					?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="restaurants-gallery"><i class="fal fa-comment-alt-smile fa-lg"></i> &nbsp; <?php the_title(); ?> Reviews</h2>
				</div>
			</div>

		</div>

		<?php
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>