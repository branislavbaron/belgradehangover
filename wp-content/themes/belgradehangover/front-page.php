<?php

    $events = tribe_get_events([

	'posts_per_page' => -1,

        'tag' => 'hp'

    ]);



    $date = new DateTime();

    $today = $date->format('l');



    $thisWeek = getThisWeekDates();



    $thisWeekEvents = array_filter($events, function($event) use($thisWeek) {

        $eventStartDate = strtotime($event->EventStartDate);



        return (($eventStartDate > $thisWeek[0]) && ($eventStartDate < $thisWeek[6]));

    });



    get_header();

?>



	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

      <section id="header" class="header animated fadeIn">



  			<div class="header__photo fullscreen background" data-img-height="1080" data-img-width="1920" alt="<?php bloginfo( 'name' ); ?>"></div>

  				<div class="header__holder">
                    <img class='animated zoomInDown' src="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                <div class="sitename">
                  <h1>Online platform for booking nightclubs and restaurants in world's nightlife capital of Belgrade!</h1>
                </div>

                </div>
                <div class="fa-5x arrow-down-fp hvr-sink">
                   <i class="fal fa-chevron-down"></i> 
                </div>
  		</section>

            <section id="weekSchedule" class="weekSchedule">
                <h2 class="popular-events"><i class="fal fa-bomb fa-2x" data-fa-transform="down-2"></i> The most popular upcoming events in Belgrade</h2>
                <div class="weekSchedule__days">
                    <?php foreach ($thisWeek as $day) : ?>

                        <?php

                            $date = new DateTime();

                            $date->setTimestamp($day);

                        ?>

                        <?php $dayName = $date->format('l'); ?>

                        <div class="day hvr-shutter-in-horizontal<?php echo ($dayName === $today) ? ' active' : ''; ?>" data-scheduled4="<?php echo strtolower($dayName); ?>">

                            <div class="dayName"><?php echo $dayName; ?></div>

                            <div class="dayDate"><?php echo $date->format('j. F'); ?></div>

                        </div>

                    <?php endforeach; ?>

                </div>
            </section>
            <div class="row">
              <div class="col-md-12">
                      <h1 class="display-4 event-heading"><i class="fal fa-play"></i> Next Event</h1>
              </div>
            </div>
<section id="event-list">
      <div class="container">  

      <?php foreach ($thisWeekEvents as $event): ?>

          <?php

              $eventDate = (new DateTime($event->EventStartDate));

              $eventDayName = $eventDate->format('l');

              $eventDateYmd = $eventDate->format('Y-m-d');

              $eventDatemdY = $eventDate->format('m-d-Y');

              $eventDated = $eventDate->format('d');

              $eventDatem = $eventDate->format('F');

              $eventStartDateHrs = $eventDate->format('H');

              $eventDateEnd = (new DateTime($event->EventEndDate));

              $eventEndDateHours = $eventDateEnd->format('H');
          ?>
                    <div class="eventSchedule scheduled4-<?php echo strtolower($eventDayName); ?><?php echo ($eventDayName === $today) ? ' active' : ''; ?>">
        <div class="weekSchedule__events row">

                <div class="col-md-4">
                        <div class="event">

                        <?php

                            $nightclub = get_post($event->nightclub);

                            $nightclub_permalink = get_post_permalink($event->nightclub);


                        ?>

                            <div class="eventImage">

                                <a href="<?php echo $nightclub_permalink; ?>">

                                    <img src="<?php the_field('nightclub_logo', $event->nightclub); ?>" alt="" />

                                </a>

                            </div>
                            <div class="brand-img">
                              <img src="wp-content/themes/belgradehangover/img/BH-BLACK-LOGO_1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                      <div class="list-group eventDetails">
                        <a href="<?php echo esc_url( tribe_get_event_link($event) ); ?>" class="list-group-item list-group-item-action eventListItem">
                          <div class="row">
                            <div class="col-md-9">
                              <h5 class="eventTitle"><?php echo $event->post_title; ?></h5>
                              <p class="nightclubName"><i class="fal fa-map-marker-alt fa-lg"></i> <?php echo $nightclub->post_title; ?></p>
                              <p class="musicans"><i class="fal fa-headphones fa-lg"></i> <?php echo $event->musicans; ?></p>
                              <p class="partyTime"><i class="fal fa-clock fa-lg"></i> <?php echo($eventStartDateHrs); ?> - <?php echo($eventEndDateHours); ?> Hours</p>
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
                        <a href="<?php echo esc_url( tribe_get_event_link($event) ); ?>" class="list-group-item list-group-item-action eventListItem"><p class="eventDescription"><?php echo $event->post_content; ?></p></a>
                        <div class="bookPrice list-group-item list-group-item-action eventListItem">

                          <span style="margin-left: 5%;">Booking Price: <?php echo tribe_get_cost($event, true); ?></span><img src="wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg" style="margin-left: -5%;" alt="">

                          <a href="<?php echo esc_url( home_url( '/book-online?nightclub=' . $nightclub->post_name . '&date=' . $eventDateYmd ) ); ?>" class="btn btn-outline-danger btn-lg btn-block btn-book hvr-glow pull-right">Book the table</a>
                        </div>
                      </div>
                    </div>
                    </div>
</div>
                    <?php endforeach; ?>
            </div>

            </section>

          <section id="howItWorks">
            <div class="row">
              <div class="col-md-12">
                      <h1 class="display-4 howItWorks-heading"><i class="fal fa-cogs"></i> How it works</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card-group">
                  <div class="card">
                    <div class="card-icon">
                       <i class="fal fa-desktop fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Book your table online</h5>
                        <p class="card-text">We have over 60 places available including pubs, bars, nightclubs and restaurants - pick your favorite place.</p>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-icon">
                        <i class="fal fa-envelope fa-2x"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Receive confirmation</h5>
                        <p class="card-text">Receive confirmation e-mail of your reservation with random generated code.</p>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-icon">
                        <i class="fal fa-street-view fa-2x"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Check-in</h5>
                        <p class="card-text">Use the code to check-in on location to confirm your reservation and take your desired seat.</p>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-icon">
                        <i class="fal fa-ticket fa-2x"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Get percentage discount</h5>
                        <p class="card-text">Receive certain amount of tokens back as a reward, use them as percentage discount on total bill.</p>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-icon">
                        <i class="fal fa-beer fa-2x"></i>
                    </div>                    
                    <div class="card-body">
                      <h5 class="card-title">HODL your beer</h5>
                        <p class="card-text">Make sure to create a remarkable memories with your friends.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

            <section id="latestArticles" class="latestArticles">




                <div class="latestArticles__list">

                <h2 class="page-heading display-4"><i class="fal fa-book"></i> Read Our <span>Blog<span></h2>

                    <?php

                        echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="2" scroll="false" transition="fade" button_label="Load More Articles" button_loading_label="Loading Articles..."]');

                    ?>



                </div>



            </section>

            <section id="aboutUs" class="aboutUs">

              <div class="aboutUs-banner">

                <h2 class="display-1">In Belgrade every single day is Friday!</h2>

              </div>

            <div class="container container-about">
              <div class="row">
                  <div class="col-md-6 br">
                      <h2 class="display-4"><span>About</span> Us</h2>

                      <p class="lead">Belgrade to the fullest. Meet The Best Clubs of Belgrade staff! We are an organisation dedicated to make all your wildest dreams come true.</p>

                      <p class="lead">With our service you can do everything from booking a table at a restaurant and renting a car, to taking a tour of the city and of course, reserving a place in Belgrade’s finest nightclubs. We believe that our background and experience in tourism and entertainment will ensure an unforgettable experience of the capital of Serbia.</p>

                      <p class="lead">Contact us via phone, email or Facebook/Instagram and let’s make an arrangement custom made to fufill all your needs and wishes. Just relax, let us take care of everything, and fulill your vacation with quality time. Cheers!</p>

                      <a href="<?php echo esc_url( home_url( '/about-us')); ?>"><div class="aboutus-contact-info hvr-bounce-to-right">
                        <span>READ MORE</span>
                      </div></a>
                  </div>
                  <div class="col-md-6 no-br">
                    <h2 class="display-4">Contact</h2>

                      <p class="lead"> What are you waiting for? Call us, send us a message or book online, in no time you will be part of the best atmosphere ever seen.</p>

                      <a href="tel:+381-63-150-5555"><div class="aboutus-contact-info hvr-bounce-to-right">
                            <i class="far fa-phone-square fa-2x" aria-hidden="true"></i> 
                          <span>+381 63 150 5555</span>

                      </div></a>


                      <a href="mailto:contact@belgradehangover.com"><div class="aboutus-contact-info hvr-bounce-to-right">
                            <i class="far fa-envelope fa-2x" aria-hidden="true"></i> 
                          <span>office@belgradehangover.com</span>
                      </div></a>

                      <a href="<?php echo esc_url( home_url( '/book-online')); ?>"><div class="aboutus-contact-info hvr-bounce-to-right">
                        <span class="text-uppercase">book online</span>
                      </div></a>
                  </div>
              </div> 
            </div>
            </section>

            <section id="newsletter">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="display-4 newsletter-heading text-center"><i class="fal fa-newspaper"></i> Subscribe to our newsletter</h1>
                    <p class="lead text-center">Get hottest upcoming events, promotinal codes for reservations, directly on your e-mail address!</p>
                    <form class="form-inline">
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fal fa-envelope fa-2x"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email address">
                      </div>
                      <button type="submit" class="btn btn-danger btn-sz mb-2">Subscribe</button>
                    </form>
                  </div>
                </div>
              </div>
            </section>


            <div class="fa-5x arrow-up-fp hvr-float">
               <i class="fal fa-chevron-circle-up"></i>
            </div>

		</main><!-- #main -->

	</div><!-- #primary -->



<?php

get_footer();

