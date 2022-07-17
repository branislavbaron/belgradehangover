<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package belgradehangover
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class="page-wrapper">
				<div class="page-content">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-error display-3 text-center">Page not found</h2>
							<h1 class="page-title">
								<span class="text-right">4</span>
								<div class="notfound-img">
									<img src="/wp-content/themes/belgradehangover/img/bh-title-404.png" alt="">
								</div> 
								<span class="text-left">4</span></h1>
						</div>
						<div class="col-md-12">
							<div class="error-caption-holder text-center">
							<p class="error-caption">
								Sorry, we couldn't find what you were searching for! <br>
								That's probably because we are already partying in the finest clubs in Belgrade! <br>
								Join us by booking your place now!
							</p>
							<a href="/book-now" class="btn btn-outline-light btn-lg">BOOK NOW</a>
							</div>
						</div>
					</div>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>