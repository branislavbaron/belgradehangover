<?php

require_once "wp-load.php";

global $wpdb;

echo json_encode($wpdb->get_results("SELECT * FROM wp_ost_log ORDER BY id DESC LIMIT 1"));