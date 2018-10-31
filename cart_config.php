<!--	
	=======================
	cart_config.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is for the configuration of the basket/cart system.
	=======================
-->
<?php
$currency = '&#163;';

$db_username = 'root';
$db_password = '';
$db_name = 'test';
$db_host = 'localhost';

$shipping_cost = " ";
$taxes              = array(
                            '<span style="float:left;text-align: right;">VAT</span>' => 20,
                            );											
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error: ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>