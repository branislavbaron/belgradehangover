<?php 


/**
 * Template Name: Photo Store
 */
get_header(); ?>
<?php

global $wpdb;
global $ostObj;

$url = get_site_url();
$pathForPhoto = $url . '/wp-content/'; 
$photos = $wpdb->get_results("SELECT * FROM wp_photos WHERE status = 1");
$user = wp_get_current_user();
$ownedPhotos = $wpdb->get_results("SELECT * FROM wp_photo_transactions WHERE buyer_id = $user->ID");


if(!empty($photos) && !empty($ownedPhotos)) {
    foreach ($photos as $key => $value) {
        foreach($ownedPhotos as $ownedKey => $ownedPhoto) {
            if ($value->id == $ownedPhoto->photo_id) {
                $value->ownStatus = true;
                break;
            } else {
                $value->ownStatus = false;
            }
        }
    }
}
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main animated fadeIn" role="main">
        <div class='container-fluid photo-page' style="margin-top: 5rem;">
            <h2 class="display-5">Pro Photos available for purchase</h2>
            <div class="row">
        <?php
        if(!empty($photos)) {
            
            foreach ($photos as $key => $value) {
                $photoURL = $pathForPhoto . $value->file_path . '/' . $value->photo_name;
                if ($value->ownStatus) {
                    echo 
                    "
                    <div class='col-md-4 col-12'>
                    <div class='venueBlock'>
                    <div class='card event-card'>
                        <div class='red-logo'><img src='/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png' alt=''></div>
                        <div class='red-borders'>
                            <span></span>
                        </div>
                        <div class='event-pict'>
                            <img src='$photoURL' class='img-shop'>
                        </div>
                        <div class='card-body'>
                            <h3 class='card-title text-center'>You already own this photo!</h3>
                        </div>
                        <div class='card-footer'>
                        <label for='buyphoto'>Price: 8.50<img src='/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg' style='width: 1.5rem; display: inline-block; margin-left: 0.2rem; margin-bottom: 0.5rem' alt=''></label> <span style='color: black;font-size: 1.2rem;'> | </span>
                        <span class='d-inline-block' data-trigger='hover' data-toggle='popover' data-content='You already own this photo'>
                          <button class='btn btn-outline-danger' style='pointer-events: none;' type='button' disabled>Purchase</button>
                        </span>
                        </div>
                    </div>
                    </div>
                    </div>
                    ";
                } else { 
                    echo 
                    "
                    <div class='col-md-4 col-12'>
                    <div class='venueBlock'>
                    <div class='card event-card'>
                        <div class='red-logo'><img src='/wp-content/themes/belgradehangover/img/BH-WHITE-LOGO.png' alt=''></div>
                        <div class='red-borders'>
                            <span></span>
                        </div>
                        <div class='event-pict'>
                        <form action='$url/wp-purchase-photo.php' method='POST' id='photo$value->id'>
                            <img src='$photoURL' class='img-shop'>
                            <input type='hidden' name='photo_id' value='$value->id'>
                            <input type='hidden' name='seller_id' value='$value->user_id'>
                        </form>
                        </div>
                        <div class='card-body'>
                            <h3 class='card-title text-center'>Hover over to reveal the photo!</h3>
                        </div>
                        <div class='card-footer'>
                        <label for='buyphoto'>Price: 8.50<img src='/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg' style='width: 1.5rem; display: inline-block; margin-left: 0.2rem; margin-bottom: 0.5rem' alt=''></label> <span style='color: black;font-size: 1.2rem;'> | </span>
                        <input type='submit' form='photo$value->id' id='buyphoto' value='Purchase' class='btn btn-purchase btn-outline-danger' onclick='return confirm(\"Are you sure you want to purchase photo: $value->photo_name?\")';>
                        </div>
                    </div>
                    </div>
                    </div>
                    ";
                }
            }
        }
    ?>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid photo-banner text-center">
      <div class="container">
        <h2 class="display-5">Get photos you already bought</h2>
        <a class="btn btn-danger btn-lg" href="<?php echo esc_url( home_url( '/my-photos')); ?>" role="button">Download now</a>
      </div>
    </div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>