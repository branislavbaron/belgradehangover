<!DOCTYPE html>

<html <?php language_attributes(); ?>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- 	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109292859-1"></script> -->
<!-- 	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-109292859-1');
	</script> -->

	<?php
//	if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
//	    ob_start( "ob_gzhandler" );
//	}
//	else {
//	    ob_start();
//	}
//	?>


<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta property="og:image" content="/wp-content/themes/belgradehangover/img/thumb.jpg" />



<meta property="og:image:type" content="image/jpeg" />

<meta property="og:image:width" content="400" />

<meta property="og:image:height" content="300" />

<meta name="twitter:image" content="/wp-content/themes/belgradehangover/img/thumb.jpg">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-57x57.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-60x60.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-72x72.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-76x76.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-114x114.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-120x120.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-144x144.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-152x152.png' ) ); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/apple-touch-icon-180x180.png' ) ); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/favicon-32x32.png' ) ); ?>">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/android-chrome-192x192.png' ) ); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/favicon-16x16.png' ) ); ?>">
<link rel="manifest" href="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/manifest.json' ) ); ?>">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/mstile-144x144.png' ) ); ?>">
<meta name="theme-color" content="#1e1e1e">


<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css" rel="stylesheet" type="text/css" />


<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

<div class="stickySidebar animated animated-delay fadeInLeft">

	<a class="hvr-buzz-out" href="<?php echo esc_url( home_url( '/book-online' ) ); ?>">

		<img src="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/book-online.png' ) ); ?>">

	</a>

</div>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'belgradehangover' ); ?></a>



	<header id="masthead" class="site-header" role="banner">

<nav id="site-navigation" class="main-navigation" role="navigation">

<div class="row">
<div class="col-md-1">

<!-- MENU ICON -->

<div id="nav-icon1">
  <span></span>
  <span></span>
  <span></span>
</div>

<!-- LOGO -->
</div>

<div class="col-md-2 offset-md-4">
		<div class="site-branding">

			<?php

			if ( is_front_page() && is_home() ) : ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

						<img src="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/BH-BLACK-LOGO.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" />

					</a>

			<?php else : ?>

				<?php

					$logo = ((get_post_type() === 'post' && !is_home()) || is_page(getPagesWithBlackLogo())) ? esc_url( home_url( '/wp-content/themes/belgradehangover/img/BH-BLACK-LOGO.png' ) ) : esc_url( home_url( '/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png' ) );

				?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

						<img class="hvr-pop" src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />

					</a>

			<?php

			endif;

			?>

		</div><!-- .site-branding -->
</div>

<div class="col-md-3 offset-md-2">

	<!-- PROMO -->
	<div class="events-promo-btns">
		<a class="btn btn btn-outline-danger btn-lg" href="<?php echo get_permalink( get_page_by_path( 'events' ) ) ?>" role="button">Events</a>

		<a class="btn btn btn-outline-danger btn-lg" href="<?php echo esc_url( home_url( '/booking' ) ); ?>" role="button">Booking</a>

		<?php if ( is_user_logged_in() ) {
			$user = wp_get_current_user();
		    // TOKEN AMOUNT CODE
			global $ostObj;
			global $userBalance;
			global $wpdb;

			$current_user = wp_get_current_user();
			$getBalance = $ostObj->services->balances;
			$userBalance = $getBalance->get(['id' => $current_user->user_uid])->wait();
			$response = json_encode($userBalance);
			$wpdb->insert("wp_ost_log", array(
				'response' => $response
			)); 

			$userBalance = $userBalance['data']['balance']['available_balance'];
			// TOKEN AMOUNT CODE END
		?>

			  <a class="btn btn-outline-danger p-8" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu">
			    <i class="fal fa-user fa-2x"></i>
			  </a>
			<div class="collapse" id="collapseMenu">
				<div class="list-group">
				  <a href="<?php echo esc_url( home_url( '/user-profile' ) ); ?>" class="list-group-item list-group-item-action">View Profile <p><?php echo $current_user->user_login;  ?></p></a>
					<a class="list-group-item list-group-item-action">Your Role: <p><?php $user_info = get_userdata($user->ID);
		      echo implode(', ', $user_info->roles);
		?></p></a>
						<?php 
						$url = esc_url( home_url('/my-photos' ) );

							if( !current_user_can('photographers') ) {
								echo '<a href="' . $url . '" class="list-group-item list-group-item-action">My Photos</a>';    
							}
						 ?>
				  <a class="list-group-item list-group-item-action">BHC Balance: <?php echo round($userBalance, 2); ?><img src="/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg" style="width: 2rem; display: inline-block;" alt=""></a>
				  <a href="<?php echo wp_logout_url(home_url('/log-in')); ?>" class="list-group-item list-group-item-action">
				    Logout
				  </a>
				</div>
			</div>
		<?php } else { ?>
		    <a class="btn btn btn-outline-danger btn-lg" href="<?php echo esc_url( home_url( '/log-in' ) ); ?>" rel="home">Login</a>
		<?php } ?>
	</div>
	</div>
	</div> <!-- row end -->
	<div class="overlay" id="overlay">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-1','container_class' =>'full-menu-content', 'menu_class' => 'list-unstyled' ) ); ?>
		<ul class="list-inline">
			<li class="list-inline-item">
				<a href="https://www.facebook.com/hangoverbelgrade/" target="_blank"><i class="fab fa-lg fa-facebook"></i></a>
			</li>
			<li class="list-inline-item">
				<a href="https://twitter.com/BelgradeHngvr" target="_blank"><i class="fab fa-lg fa-twitter-square"></i></a>
			</li>
			<li class="list-inline-item">
				<a href="https://www.youtube.com/channel/UCOjZzQFQbIvAYxFZVeeRxZg" target="_blank"><i class="fab fa-lg fa-youtube"></i></a>
			</li>
			<li class="list-inline-item">
				<a href="https://www.instagram.com/" target="_blank"><i class="fab fa-lg fa-instagram"></i></a>
			</li>
		</ul>
	</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->



	<div id="content" class="site-content">

