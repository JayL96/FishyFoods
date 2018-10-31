<!--	
	=======================
	logout.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file logs a user out from their existing session.
	=======================
-->

<?php
	if(!isset($_SESSION)) session_start();
	unset($_SESSION['user']);
	session_destroy();
	header("location: http://localhost/mysite");
?>