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

	$events = tribe_get_events([
		'meta_query' => [
			[
				'key' => 'nightclub',
				'value' => get_the_ID()
			]
		]
	]);

    $thisWeek = getThisWeekDates();

	$thisWeekEvents = array_filter($events, function($event) use($thisWeek) {
        $eventStartDate = strtotime($event->EventStartDate);

        return (($eventStartDate > $thisWeek[0]) && ($eventStartDate < $thisWeek[6]));
    });

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
									<li class="list-inline-item"><i class="fal fa-child fa-lg"></i> Capacity: <?php echo get_field('capacity'); ?> |</li>
									<li class="list-inline-item"><i class="fal fa-music fa-lg"></i> Music: <?php echo get_field('music'); ?> |</li>
									<li class="list-inline-item"><i class="fal fa-clock fa-lg"></i> Work Hours: <?php echo get_field('work_hours'); ?></li>
							</ul>
					</div>
		</section>
		<div class="arrow-down-normal"><i class="fal fa-chevron-down fa-lg hvr-sink" aria-hidden="true"></i></div>

		<div class="contentPage singleNightclubPage text-center">
			<h2 class="display-3"><i class="fal fa-hashtag fa-lg"></i><div class="line-l"></div> <?php the_title(); ?></h2>

			<div class="singleNightClubPage row">
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
					<img src="<?php echo get_field('nightclub_logo'); ?>" class="img-thumbnail" alt="<?php the_title(); ?>" />
				</div>
			</div>
			<div class="nightclubWeekSchedule row">
				<div class="col-md-12">
								<h2 class="display-5"><i class="fal fa-play fa-lg"></i> This week at <?php the_title(); ?> <div class="line"></div></h2>
				</div>

				<div class="nightclubWeekSchedule__list col-md-6 mx-auto">
					<?php foreach ($thisWeekEvents as $event): ?>
						<?php
							$eventDate = (new DateTime($event->EventStartDate));
							$eventDateNice = $eventDate->format('l j. F');
							$eventDateYmd = $eventDate->format('Y-m-d');

							$eventDayName = $eventDate->format('l');

							$eventDatemdY = $eventDate->format('m-d-Y');

							$eventDated = $eventDate->format('d');

							$eventDatem = $eventDate->format('F');

							$eventStartDateHrs = $eventDate->format('H');

							$eventDateEnd = (new DateTime($event->EventEndDate));

							$eventEndDateHours = $eventDateEnd->format('H');
						?>
                        <?php $nightclub = get_post($event->nightclub);	?>

						<div class="list-group eventDetails">
						  <a href="<?php echo esc_url( tribe_get_event_link($event) ); ?>" class="list-group-item list-group-item-action eventListItem">
						    <div class="row">
						      <div class="col-md-9">
						        <h5 class="eventTitle"><?php echo $event->post_title; ?></h5>
						        <span class="nightclubName"><i class="fal fa-map-marker-alt fa-lg"></i> <?php echo $nightclub->post_title; ?></span>
						        <span class="musicans"><i class="fal fa-headphones fa-lg"></i> <?php echo $event->musicans; ?></span>
						        <span class="partyTime"><i class="fal fa-clock fa-lg"></i> <?php echo($eventStartDateHrs); ?> - <?php echo($eventEndDateHours); ?> Hours</span>
						      </div>
						      <div class="col-md-3">
						        <div class="eventDay">
						          <p><?php echo ($eventDayName); ?></p>
						          <p class="dateInNumber"><?php echo ($eventDated); ?></p>
						          <p><?php echo ($eventDatem); ?></p>
						        </div>
						      </div>
						    </div>
						  </a>
						  <li class="list-group-item eventListItem"><p class="eventDescription"><?php echo $event->post_content; ?></p>
						  </li>
						  <div class="bookPrice list-group-item eventListItem">
						    <a href="<?php echo esc_url( home_url( '/book-online?nightclub=' . $nightclub->post_name . '&date=' . $eventDateYmd ) ); ?>" class="btn btn-outline-danger btn-lg btn-block btn-book hvr-glow pull-right">Book the table  <?php echo tribe_get_cost($event, true); ?><img src="/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg" alt=""></a>
						  </div>
						</div>


					<?php endforeach; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h2 class="nightclubs-gallery"><i class="fal fa-camera-retro fa-lg"></i> &nbsp; <?php the_title(); ?>'s Gallery</h2>
				</div>
			</div>

			<div class="venueGallery">
				<?php echo do_shortcode(get_field('nightclub_gallery')); ?>
				<a href='<?php echo esc_url( home_url( '/photo-store' ) ); ?>' class='btn btn btn-outline-danger btn-block btn-lg btn-photos'>Get PRO photos of yourself in best quality! <i class="fal fa-cloud-download fa-lg"></i></a>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2 class="nightclubs-gallery"><i class="fal fa-map fa-lg"></i>&nbsp; <?php the_title(); ?>'s Location</h2>
					<?php 

					$location = get_field('google_map');

					if( !empty($location) ):
					?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
				</div>
			</div>

		<?php
			endwhile; // End of the loop.
		?>

			<div class="row">
				<div class="col-md-12">
					<h2 class="p-0"><i class="fal fa-comment-alt-smile fa-lg"></i> &nbsp;  <?php the_title(); ?> Reviews</h2>
					<a class="btn btn-danger pull-right btn-lg" href="<?php echo esc_url( home_url( '/user-reviews/create/reviews/' ) ); ?>" role="button">Write a review</a>
				</div>
			</div>



			<div class="row">
					<?php
				global $post;
				$args = array( 'posts_per_page' => 10, 'category'=> '1', 'order'=> 'ASC', 'orderby' => 'title' );
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) :
				  setup_postdata( $post ); ?> 
				<div class="col-md-4">
					<div class="reviews">								
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

											<img class="img-fluid mb-10" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
										<div class="rev-info">  
											<span class="review-date pull-left"><i class="fal fa-calendar-alt fa-lg"></i> <?php the_date(); ?></span>
											<span class="review-author pull-right"><i class="fal fa-user fa-lg"></i> <?php echo get_the_author(); ?></span>
										</div>
											<?php the_excerpt(); ?>

								<a class="btn btn-danger btn-block btn-lg" href="<?php echo esc_url( get_permalink() ); ?>" role="button">Read More</a>
							</div>
					</div>
				<?php
				endforeach; 
				wp_reset_postdata();
				?>

			</div>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
