<?php
require_once 'classes/DB.php';
require_once 'classes/Session.php';

$db = new DB();
$db->connect();

$session = new Session();
$session->start();
$user = $session->get();

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date_current = '';
$date_current = date("Y-m-d H:i:sa");

if ($user) {
	$sql_get_date_user = "SELECT * FROM users WHERE username = '$username'";
	$data_user = $db->fetch_assoc($sql_get_date_user, 1);
}
 
?>