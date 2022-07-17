<?php

require_once "wp-load.php";

if (!is_user_logged_in() || !isset($_POST['photo_id']) || !isset($_POST['seller_id'])) {
    header("Location: " . get_site_url()); // we are preventing users from manually trying to access this script
}

global $ostObj;
global $wpdb;

$user = wp_get_current_user();

$sellerID = $_POST['seller_id'];

$seller = $wpdb->get_results("SELECT user_uid FROM wp_users WHERE ID = $sellerID")[0]->user_uid;

$transactionService = $ostObj->services->transactions;

$executeParams = array();
$executeParams['from_user_id'] = $user->user_uid; // from buyer
$executeParams['to_user_id'] = $seller; // to seller
$executeParams['action_id'] = '31171'; // photo purchase id

$response = $transactionService->execute($executeParams)->wait();


$wpdb->insert("wp_ost_log", array(
	'response' => json_encode($response)
));

$transactionID = $response['data']['transaction']['id'];


$wpdb->insert("wp_photo_transactions", array(
    'photo_id' => intval($_POST['photo_id']),
    'seller_id' => intval($sellerID),
    'buyer_id' => intval($user->ID),
    'ost_transaction_id' => $transactionID
)); 


header("Location: " . get_site_url() . "/my-photos/");