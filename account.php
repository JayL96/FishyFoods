<!--	
	=======================
	account.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is the account overview of the currently logged in user.
	=======================
-->
<?php
	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['user'])) header("location: http://localhost/mysite/");	//Return to login page if not logged in.
	$type = "acc-overview";
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Your Account | Fishy Foods</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
        <script>
			$(document).ready(function(){
				$("#box2").fadeIn();
			 });
			 new WOW(
				).init();
        </script>
		<style>
			*{max-width:100%;}
		</style>
    </head>
    <body>
		<ul id="nav">
		  <li><a href="home.php">Home</a></li>
		  <li><a href="products.php">Products</a></li>
		  <li><a href="contact-us.php">Contact Us</a></li>
		  <li style="float:right"><a href="logout.php">Log Out</a></li>
		  <li style="float:right;cursor:pointer;"><a class="active" href="account.php">Your Account</a></li>
		</ul>
		<header>
			<div id="container">
				<div class="row">
					<div class="col-md-2 col-sm-6" style="width:100%;">
						<h1>Your Account</h1>
					</div>
				</div>
				</br></br>
				<div id="account-menu">
					<div id="side-box">
						<h3>Menu</h3>
						<ul id='side-menu'>
						<li><a href="?type=acc-overview" rel='acc-overview'>Account Overview</a></li>
						</ul>
					</div>	
					<div id="account-box">
						<?php
						if($type === 'acc-overview'){
							$caption = "This is your account overview to keep up-to-date on the details you provide us with.<br></br><br></br><br><br>
							Name: {$_SESSION['user']['name']}</br>
							Email Address: {$_SESSION['user']['email']}</br>
							Address: {$_SESSION['user']['address']}<br>
							Postcode: {$_SESSION['user']['postcode']}<br>
							City: {$_SESSION['user']['city']}<br>
							Telephone/Mobile Number: {$_SESSION['user']['telephone']}";
						}
						?>
						<div class="logo">
							<h3 class="logo-caption"><?= $caption; ?></h3>
						</div>
						<div class="controls">
							<?php
								if(isset($form))
									echo($form);
							?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="footer">
			<p style="margin-top:3px;margin-left:8px;float:left;font-size:14px;">You're currently logged in as: <?= $_SESSION['user']['name']; ?> (<?= $_SESSION['user']['email']; ?>)</p>
			<p style="margin-right:5px;margin-top:8px;float:right;font-size:10px;">&copy 2018 - Fishy Foods.</p>
		</div>
    </body>
</html>
