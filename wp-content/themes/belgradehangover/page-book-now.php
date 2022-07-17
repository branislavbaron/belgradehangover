<?php
    /* Template Name: Book Now */
    get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main animated fadeIn" role="main">

        <div class="services">
          <div class="row">
            <div class="col-md-4 nightclubs-bg">
              <div class="red-logo"><img src="/belgradehangover/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
              <div class="red-borders">
                <span></span>
              </div>
              <div class="service-info">
                <div class="icon">
                    <i class="fal fa-glass-martini fa-5x"></i>
                </div>    
                <h1 class="service-title display-4 page-heading text-uppercase">Nightclubs</h1>
                <span class="text-center text-uppercase"><strong>The best nightclubs in Belgrade</strong></span>
                <p class="lead">Belgrade nightlife offers unique clubbing experience among other cities of the Europe. Clubbing close to a river, with unlimited amount of exclusive drinks, dancing with hottest girls and boys of Europe, enjoying the most intense clubbing parties, that's what <strong>Belgrade Hangover</strong> team offers.</p>
                <a href="<?php echo get_permalink( get_page_by_path( 'booking/nightclubs' ) ) ?>">
                  <div class="service-explore text-center hvr-box-shadow-inset">
                      <span class="text-center text-uppercase">Explore</span>
                  </div>
                </a>
              </div>
            </div>


            <div class="col-md-4 restaurants-bg">
              <div class="red-logo"><img src="/belgradehangover/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
              <div class="red-borders">
                <span></span>
              </div>
              <div class="service-info">
                <div class="icon">
                    <i class="fal fa-utensils-alt fa-5x"></i>
                </div>  
                <h1 class="service-title display-4 page-heading text-uppercase">Restaurants</h1>
                <span class="text-center text-uppercase"><strong>The best restaurants to eat in Belgrade</strong></span>
                <p class="lead"><strong>Belgrade restaurants</strong> serve the national cuisine, but there are more than plenty with international food and a wide variety of different cuisines is available. Visit one of <strong>Belgrade restaurants</strong> and have a tasty meal in a pleasant environment close to rivers of Belgrade, Danube and Sava. </p>
                <a href="<?php echo get_permalink( get_page_by_path( 'booking/restaurants' ) ) ?>">
                  <div class="service-explore text-center">
                      <span class="text-center text-uppercase">Explore</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-md-4 tours-bg">
              <div class="red-logo"><img src="/belgradehangover/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
              <div class="red-borders">
                <span></span>
              </div>
              <div class="service-info">
                <div class="icon">
                    <i class="fal fa-camera-retro fa-5x"></i>
                </div>  
                <h1 class="service-title display-4 page-heading text-uppercase">Take a Tour</h1>
                <span class="text-center text-uppercase"><strong>The best places to take photo in Belgrade</strong></span>
                <p class="lead"
                ><strong>Belgrade Tours</strong> takes you to joyful exploration of the city, guided by an experienced team of youngster who grew up on the streets of this historical city. We know the secrets of this strange and unique city better than anyone, every brick, corner and street, we'll make your visit memorable.</p>
                <a href="<?php echo get_permalink( get_page_by_path( 'booking/tours' ) ) ?>">
                  <div class="service-explore text-center">
                      <span class="text-center text-uppercase">Explore</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>