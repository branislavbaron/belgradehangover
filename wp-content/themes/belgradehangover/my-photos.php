<?php 


/**
 * Template Name: My Photos
 */
get_header(); ?>
<?php

global $wpdb;
$url = get_site_url();
$user = wp_get_current_user();
$pathForPhoto = $url . '/wp-content/'; 
$photos = $wpdb->get_results("SELECT * FROM wp_photo_transactions as p LEFT JOIN  wp_photos ph ON p.photo_id = ph.id WHERE p.buyer_id = $user->ID");

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main animated fadeIn" role="main">
        <div class='container-fluid photo-page' style="margin-top: 5rem;">
            <h2 class="display-5">PRO photos you have purchased so far</h2>
            <p class="lead text-center">Select appropriate format you wish to download</p>
            <div class="row">
    <?php

        if(!empty($photos)) {
            foreach($photos as $key => $value) {

                $photoURL = $pathForPhoto . $value->file_path . '/' . $value->photo_name;
                echo 
                "
                <div class='col-md-4 col-12'>
                  <div class='venueBlock'>
                  <div class='card event-card'>
                     <div class='event-pict no-glow'>
                        <img src='$photoURL' style='width:100%; height:100%;'>
                      </div>
                     <div class='card-footer text-center'>
                     <a href='$photoURL' download='$value->photo_name'>
                         <button type='button' class='btn btn-outline-danger'>Download <i class='fal fa-cloud-download'></i></button>
                     </a>
                     </div>
                   </div>
                   </div>
                </div>
                ";

            }
        }
    ?>
        </div>
    </div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>