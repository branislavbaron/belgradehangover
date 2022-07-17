<?php
/**
 * Template Name: About Us
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main animated fadeIn" role="main">

		<section class="header header-normal about animated fadeIn">
			<div class="header__photo fullscreen background" style="background-image: url('/wp-content/themes/belgradehangover/img/bhphoto.jpg'); background-size: 1961.7px 1182px;" data-img-height="1080" data-img-width="1920"></div>
			<div class="row page-intro">
				<div class="col-md-4">
					<div class="lineTemplate lineTemplate-left animated animated-delay spreadRight">&nbsp;</div>
				</div>
				<div class="col-md-4 text-center text-uppercase">
					<h1 class="display-1 animated animated-delay fadeIn">About Us</h1>
				</div>
				<div class="col-md-4">

					<div class="lineTemplate lineTemplate-right animated animated-delay spreadLeft">&nbsp;</div>
				</div>
			</div>
		</section>
		<div class="arrow-down-normal"></div>
		<div class="contentPage aboutUsPage">
			<div class="row">
				<div class="col-md-12">
					<h2 class="display-5">About us</h2>
					<div class="line"></div>
				</div>
				<div class="col-md-9">
					<?php the_content(); ?>
				</div>
				<div class="col-md-3">
					<img src="/wp-content/themes/belgradehangover/img/bhabout-us.png" alt="..." class="img-thumbnail">
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
					<h2 class="display-5 text-right">Meet the Team</h2>
					<div class="line-l"></div>
				</div>
				<div class="col-md-4">
					<div class="card bg-dark text-white">
						<div class="red-logo"><img src="/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
					  <img class="card-img" src="/wp-content/themes/belgradehangover/img/branislav.jpg" alt="Card image">
					  <div class="card-img-overlay">
					  	<span></span>
					  	<div class="img-text text-center">
						    <h5 class="card-title">Branislav Meandzija</h5>
						    <p class="card-text">Project Leader and Head Developer of Belgrade Hangover</p>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-dark text-white">
						<div class="red-logo"><img src="/belgradehangover/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
					  <img class="card-img" src="/wp-content/themes/belgradehangover/img/djiki.jpg" alt="Card image">
					  <div class="card-img-overlay">
					  	<span></span>
					  	<div class="img-text text-center">
						    <h5 class="card-title">Marko Sljukic</h5>
						    <p class="card-text">KNX programmer and mobile app Developer</p>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-dark text-white">
						<div class="red-logo"><img src="/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png" alt=""></div>
					  <img class="card-img" src="/wp-content/themes/belgradehangover/img/cvijantela.jpg" alt="Card image">
					  <div class="card-img-overlay">
					  	<span></span>
					  	<div class="img-text text-center">
						    <h5 class="card-title">Nemanja Cvijan</h5>
						    <p class="card-text">Backend Developer</p>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="aboutUsPageFooter">
			<h2>Now, let’s experience Belgrade together!</h2>
			<img src="/wp-content/themes/belgradehangover/img/about-us-footer.jpg" />
		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>