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
		</section>
		<div class="arrow-down-normal"><i class="fal fa-chevron-down fa-lg hvr-sink" aria-hidden="true"></i></div>

		<div class="contentPage singleTourPage">
			
			<h2 class="display-3"><i class="fal fa-hashtag fa-lg"></i><div class="line-l"></div> <?php the_title(); ?></h2>			<div class="call">
				<div class="call__item"><a href='tel:+381 63 1234 567'>call us now</a><span class="mask"></span></div>
				<div class="call__item"><a href='/book-online'>BOOK ONLINE</a><span class="mask"></span></div>
			</div>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="lead">
						<?php
							echo get_field('tour_info');
						?>
					</p>	
				</div>
			</div>
</div>
<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="tours-heading display-5">
						About <?php the_title(); ?>
					</h2>
				</div>
			</div>

			<ul class="row about-tour">
				<li class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<div class="row mb-20">
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<figure>
								<i class="fal fa-clock fa-2x"></i>
							</figure>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 p-0">
							<p>Duration</p>
							<p class="short-tour-info">
							<?php
							echo get_field('duration');
						?> Hours</p>
						</div>
					</div>
				</li>
				<li class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<div class="row mb-20">
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<figure>
								<i class="fal fa-male fa-2x"></i>
							</figure>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 p-0">
							<p>Who should take it</p>
							<p class="short-tour-info">
								<?php
									echo get_field('who_should_take_it');
								?>		
							</p>
						</div>
					</div>
				</li>
				<li class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<div class="row mb-20">
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<figure>
								<i class="fal fa-bus fa-2x"></i>
							</figure>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 p-0">
							<p>Type of tour</p>
							<p class="short-tour-info">
								<?php
									echo get_field('type_of_tour');
								?>
							</p>
						</div>
					</div>
				</li>
				<li class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<div class="row mb-20">
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<figure>
								<i class="fal fa-user-secret fa-2x"></i>
							</figure>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 p-0">
							<p>Live guide</p>
							<p class="short-tour-info">English, Russian, Serbian</p>
						</div>
					</div>
				</li>
				<li class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<div class="row mb-20">
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<figure>
								<i class="fal fa-credit-card fa-2x"></i>
							</figure>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 p-0">
							<p>Easy cancellation</p>
							<p class="short-tour-info">Cancel up to 24 hours in advance for a full refund</p>
						</div>
					</div>
				</li>
				<li class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<div class="row mb-20">
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<figure>
								<i class="fal fa-taxi fa-2x"></i>
							</figure>
						</div>
						<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 p-0">
							<p>Pick up service</p>
							<p class="short-tour-info">Your hotel or accommodation</p>
						</div>
					</div>
				</li>
			</ul>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="lead"><i class="fal fa-map-marker-alt"></i> <span class="text-uppercase">Meeting point:</span> We can arrange picking up in any part of Belgrade, at your hotel or accommodation. If you don't need picking up the best meeting point would be Kalemegdan fortress, as it is hard to miss and lies just above the rivers.</p>
  </div>
</div>

<div class="row">
	<div class="col-md-12">
		<h2 class="tours-heading display-5">
			Why should i take <?php the_title(); ?>? What's so special about it?
		</h2>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php the_content(); ?>
		</div>
	</div>

<div class="row">
	<div class="col-md-12">
		<h2 class="tours-heading display-5">
			<?php the_title(); ?>'s Gallery
		</h2>
		<div class="venueGallery">
			<?php echo do_shortcode(get_field('tours_gallery')); ?>
			<a href='<?php echo esc_url( home_url( '/photo-store' ) ); ?>' class='btn btn btn-outline-danger btn-block btn-lg btn-photos'>Get PRO photos of yourself in best quality! <i class="fal fa-cloud-download fa-lg"></i></a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<h2 class="tours-heading display-5">
			FAQ
		</h2>
	</div>
</div>

<div class="accordion" id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          How cancellation process work? <i class="fal fa-minus-hexagon fa-lg pull-right"></i>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Cancel up to 24 hours in advance for a full refund, if you cancel your tour less than 24 hours befor it starts you will need to pay a fee of 10%. To cancel or change your booking, please contact us via phone or email.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Are entrance tickets included in tour price? <i class="fal fa-plus-hexagon fa-lg pull-right"></i>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Yes, they are, we at Belgrade Hangover have a vision of fulfilling your dreams without you need to worry about anything. Just relax, let us take care of everything, and fulill your vacation with quality time.       
    </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          How much do you charge for pick up service? <i class="fal fa-plus-hexagon fa-lg pull-right"></i>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        It really depends on how far your hotel or accommodation is from meeting point. You should contact us beforehand to give you precise info with your currenct location in mind.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Is this private tour or other groups will join us? <i class="fal fa-plus-hexagon fa-lg pull-right"></i>
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
      	All of our tours are 100% private and exclusive, which means that it will just be you, your group and your guide on the tour.
      	Everything that happens between you will remain between you, promise.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          What about making private videos/photos? <i class="fal fa-plus-hexagon fa-lg pull-right"></i>
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
      <div class="card-body">
		You are free to record anything you would like to on your own, if you do need professional photographer we can arrange that one for you for small additional payment.
      </div>
    </div>
  </div>
</div>

<div class="row">
	<div class="col-md-12">
		<h2 class="tours-heading display-5"><i class="fal fa-comment-alt-smile fa-lg"></i> &nbsp; <?php echo the_title(); ?> Reviews</h2>
	</div>
</div>

</div>

<?php echo get_field('custom_parallax'); ?>
			</div>

		<?php
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
