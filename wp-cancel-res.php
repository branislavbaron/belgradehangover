<?php

require_once "wp-load.php";

if (!is_user_logged_in() || !isset($_POST['reservation_id'])) {
    header("Location: " . get_site_url()); // we are preventing users from manually trying to access this script
}

global $ostObj;
global $wpdb;

$user = wp_get_current_user();

$id = $_POST['reservation_id'];
$wpdb->update("wp_booking", array("book_status" => 0), array("id" => $id));

header("Location: " . get_site_url() . "/user-profile/");