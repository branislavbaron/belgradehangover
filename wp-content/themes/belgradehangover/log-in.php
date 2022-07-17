<?php
/**
 * Template Name: Log In
 */
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main animated fadeIn" role="main">
		<div class="row">
			<div class="col-md-12">
				<h2 class="display-5 text-center">Log in</h2>
				<div class="line-l"></div>
			</div>
		</div>
<?php  
			echo do_shortcode( '[bf form_slug="registration-form"]
' );?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		get_footer();
		?>