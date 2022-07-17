<?php

/**
 * Template Name: User Profile
 */
get_header(); ?>
<?php

//Get user transactions and balance data start
$user = wp_get_current_user();
global $userBalance;
global $ostObj;


$ledgerService = $ostObj->services->ledger;
$getParams = array();

$getParams['id'] = $user->user_uid;
$getParams['limit'] = 20;
$response = $ledgerService->get($getParams)->wait();

$transactions = $response['data']['transactions'];

global $wpdb;
$wpdb->insert("wp_ost_log", array(
	'response' => json_encode($response)
));

$actionService = $ostObj->services->actions;

$actionsNewArr = [];
$actionsOldArr = $actionService->getList()->wait()['data']['actions'];

foreach($actionsOldArr as $key => $value) {
	$actionsNewArr[$value['id']] = $value;
}
//Get user transactions and balance data end 

//set name fun start
function setNameFromUUID($uuid) {

	global $cUUID;

	if ($uuid == $cUUID) {
		return "Belgrade Hangover";
	}

	global $wpdb;

	$res = $wpdb->get_results("SELECT display_name FROM `wp_users` WHERE `user_uid` = '$uuid'")[0]->display_name;
	return $res;
}
//set name fun stop

//USD/EUR conversion start
$coinmarketapi = json_decode(file_get_contents("https://api.coinmarketcap.com/v2/ticker/2296/?convert=EUR"));

$priceUSD = $coinmarketapi->data->quotes->USD->price;
$userBalanceUSD = round($userBalance * $priceUSD, 2);

$priceEUR = $coinmarketapi->data->quotes->EUR->price;
$userBalanceEUR = round($userBalance * $priceEUR, 2);
//USD/EUR conversion end

//Balance change coloring start
$balanceNegative = "red";
$balancePositive = "green";
//Balance change coloring end


//Get user reservations start
global $wpdb;

$reservations = $wpdb->get_results("SELECT * FROM `wp_booking` WHERE `user_id` = $user->ID AND book_status = 1");
$reservationType = [
	3 => "nightclub",
	4 => "restaurant",
	5 => "tour"
];

//Get user reservations stop
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main animated fadeIn" role="main">

		<section id="transacts-info">
			<div class="container">
				<div class="row balance-box">
					<div class="col-md-2">
						<img src="<?php echo esc_url( home_url( '/wp-content/themes/belgradehangover/img/BH-BLACK-LOGO.png' ) ); ?>" class="rounded float-left" alt="...">
					</div>
					<div class="col-md-4">
						<h2 class="display-5"><?php echo $user->display_name; ?></h2>
						<h3 class="display-5"><i class="fal fa-at"></i> <?php echo $user->user_login;  ?></h3>
						<h3 class="display-5"><i class="fal fa-envelope"></i> <?php echo $user->user_email; ?></h3>
						<h3 class="display-5">Registred on: <?php echo $user->user_registered; ?></h3>
					</div>

					<div class="offset-md-3 col-md-3 text-center" style="border-left: 1px dashed black;">
						<h3 class="display-5 a-balance">Available Balance</h3>
						<span class="user-balance text-center"><?php echo round($userBalance, 2); ?><img src="/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg" style="width: 3rem; display: inline-block; margin-left: 0.8rem; margin-bottom: 0.5rem" alt=""></span>
						<p class="text-lead b-change">≈ </p>
						<p class="text-center currencies"><?php echo $userBalanceUSD ?> USD <?php echo $userBalanceEUR ?> EUR</p>
					</div>
					<div class="col-md-12 wallet-address">
						<h2 class="display-5 text-center"><span><i class="fal fa-wallet fa-lg"></i></span> Your wallet address: </h2>
						<p class="text-lead text-center user-uid"><?php echo $user->user_uid ?></p>
					</div>
					<div class="col-md-7">
						<h3 class="display-5">Recent Transactions</h3>
						<div class="card">
							<ul class="list-group list-group-flush">
							<?php 

							$specificTransactions = 0;

							if (!empty($transactions)) {
								
								$amountEarned = 0;

								foreach($transactions as $transaction) {

									if ($transaction['action_id'] == '31171' && in_array( 'photographers', (array) $user->roles)) {
										$specificTransactions++;
										$amountEarned += $transaction['amount'];
									}

									if ($transaction['from_user_id'] == $user->user_uid) {

										$transaction['from_user_name'] = $user->display_name;
										$transaction['to_user_name'] = setNameFromUUID($transaction['to_user_id']);

										$plusOrMinus = "-";
										$color = $balanceNegative;

									} else {

										$transaction['from_user_name'] = setNameFromUUID($transaction['from_user_id']);
										$transaction['to_user_name'] = $user->display_name;

										$plusOrMinus = "+";
										$color = $balancePositive;

									}

									$id = $transaction['id']; 
									$timestamp = $transaction['timestamp'];
									$amount = $transaction['amount'];
									$status = $transaction['status'];
									$hash = $transaction['transaction_hash'];
									$action_id = $transaction['action_id'];

								echo "<li class='list-group-item row'>
										<div class='col-md-5'>
											<p>" . date('D d-M H:i:s', $timestamp/1000) . "</p>
											<p class='bookingp'>{$actionsNewArr[$action_id]['name']}</p>
											<p>From: {$transaction['from_user_name']}</p>
											<p>To: {$transaction['to_user_name']}</p>
										</div>
										<div class='col-md-3'><p class='center change' style='color:$color'>"
											. $plusOrMinus . round($amount, 2). "<img src='/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg' style='width: 2rem; display: inline-block; margin-left: 1rem;'' alt=''>
										</p></div>
										<div class='col-md-2'><p class='center'>
											 $status
										</p>
										</div>
										<div class='col-md-2'><p class='center'>
											<a id='viewtransact' class='btn btn btn-outline-danger btn-lg' href='https://view.ost.com/chain-id/1409/transaction/$hash' target='_blank'>View <i class='fal fa-external-link'></i></a></p>
										</div>
								</li>";
							} 
						}
					?>
					</ul>
				</div>
				</div>
				<div class="col-md-5">
					
					<?php 
					if ( in_array( 'photographers', (array) $user->roles ) ) {
						echo "<h3 class='display-5'>Photos Sold <span class='pull-right'>($specificTransactions)</span></h3>";
						echo "<p>Upload photos you took to monetize your work on Belgrade Hangover. Before you start make sure you meet all requirements written bellow: </p>";
						echo "<ul class='list-unstyled'>
								<li>You photo must not that obfuscate, break laws, harm others, infringe on other’s intellectual property.</li>
								<li>Make sure your photography is HQ.</li>
								<li>Your photography must be available in at least more than 3 different formats.</li>
							</ul>";
						echo do_shortcode('[wordpress_file_upload uploadpath="uploads/photos" uploadrole="photographers" forceclassic="true"]');
						echo '<p>Once uploaded your photos are available for purchase at photo store:</p>';
						echo '<p><a href="/belgradehangover/photo-store" class="btn btn btn-outline-danger btn-block btn-lg btn-photos">Photo Store <i class="fal fa-chevron-double-right"></i></a></p>';
						echo '<h3 class="display-5 text-center" style="padding: 2rem 0; border-top: 1px dashed;">Earned BHC:</h3>';
						echo '<div class="balance-circle">';
						echo '<p class="balance-amount-circle">' . round($amountEarned, 2) . "<img src='/wp-content/themes/belgradehangover/img/belgrade-hangover-coin.svg' style='width: 1.5rem; display: inline-block; margin-left: 0.2rem; margin-bottom: 0.5rem' alt=''>" . '</p></div>';
					} else {

						$specificTransactions = sizeof($wpdb->get_results("SELECT * FROM wp_booking WHERE user_id = $user->ID AND book_status = 1"));
						
						if ($specificTransactions == null) {
							$specificTransactions = 0;
						}

						$url = get_site_url();

						echo "<h3 class='display-5'>My Reservations <span class='pull-right'>($specificTransactions)</span></h3>";
						if (!empty($reservations)) {
							foreach($reservations as $reservation) {

								$resType = $reservationType[$reservation->location_type]; // Tip rezervacije: club/restoran/tur
								$resDate = $reservation->book_date; // datum rezervacije
								$resName = $reservation->location_name; // ime lokacije
								$resTable = $reservation->table_type; // tip stola
								$resPeople = $reservation->ammount_people; // broj ljudi za rezervaciju
								// $resNumber = $reservation->phone_number; // broj telefona
								$resMsg = $reservation->book_message; // rezervaciona poruka

								echo "<div class='card'>
								  <div class='card-body'>
									  <p class='card-text text-right'><small class='text-muted'>$resDate</small></p>
									<h5 class='card-title'>$resName</h5>
									<small class='text-muted'>$resType</small></p>
									<small class='text-muted'>Message you have left with reservation: </small>
									<p class='card-text'>$resMsg</p>
									<small class='text-muted'>Table you have booked: </small>
									<p class='card-text'>$resTable</p>
									<p class='card-text people-going'>$resPeople</p>
									<form action='$url/wp-cancel-res.php' method='POST' id='res$reservation->id'>
										<input type='hidden' name='reservation_id' value='$reservation->id'>
									</form>
									<small class='text-muted people-going-txt'>People</small>
									<input type='submit' form='res$reservation->id' value='Cancel' class='btn btn btn-outline-danger' onclick='return confirm(\"Are you sure you want to cancel reservation for: $resName?\")';>
									<a href='' class='btn btn btn-outline-danger' style='margin-left: 1rem;'>Transfer <i class='fal fa-exchange'></i></a>
								  </div>
								</div>";

							} 
						}
					} 
					?>
				</div>
			</div>
		</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>