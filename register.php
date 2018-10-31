<!--	
	=======================
	register.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file allows a user to register to Fishy Foods. 
	Validation is included (see js/validateRegistration.js).
	=======================
-->

<?php
	if(!isset($_SESSION))	session_start();
	if(isset($_SESSION['user'])) header("location: http://localhost/mysite/home.php");
	
	$input = array("name", "email", "password", "postcode", "address", "city", "telephone");
	$label = array("Name", "Email Address", "Password", "Postcode", "Address", "City", "Telephone/Mobile Number");
	
	if(isset($_POST['name'])){
		if(isset($_POST['email'])){
			if(isset($_POST['password'])){
				if(isset($_POST['postcode'])){
					if(isset($_POST['address'])){
						if(isset($_POST['city'])){
							if(isset($_POST['telephone'])){
								$c = mysqli_connect('localhost', 'root', '', 'test');
								if(!$c) die("Database Connection Error: " . mysqli_connect_error());
								$name = mysqli_real_escape_string($c, $_POST['name']);
								$pass = md5($_POST['password']);
								$email = mysqli_real_escape_string($c, $_POST['email']);
								$address = mysqli_real_escape_string($c, $_POST['address']);
								$postcode = mysqli_real_escape_string($c, $_POST['postcode']);
								$city = mysqli_real_escape_string($c, $_POST['city']);
								$telephone = mysqli_real_escape_string($c, $_POST['telephone']);
								$q = mysqli_query($c, "SELECT * FROM users WHERE email='$email'");
								if(!$q) die("Account Check Error: " . mysqli_error($c));
								if($q->num_rows <= 0){
									$reg = mysqli_query($c, "INSERT INTO users (name, email, password, address, postcode, city, telephone) 
									VALUES ('$name', '$email', '$pass', '$address', '$postcode', '$city', '$telephone')");
									if(!$reg) die("Error Creating Account: " . mysqli_error($c));
									else {
										$acc = mysqli_query($c, "SELECT * FROM users WHERE email='$email'");
										if(!$acc) die("Error fetching account: " . mysqli_error($c));
										$_SESSION['user'] = mysqli_fetch_assoc($acc);
										header("location: http://localhost/mysite/home.php");
									}
								} else $errorMessage = "That email address is already registered.";
							} $errorMessage = "Please enter your telephone number.";
						} $errorMessage = "Please enter your city.";
					} $errorMessage = "Please enter your address.";
				} $errorMessage = "Please enter postcode.";
			} $errorMessage = "Please enter your password.";
		} $errorMessage = "Please enter your email address.";
	} $errorMessage = "Please enter your name.";

 function getIP(){
    if(isset($_SERVER['HTTP_CLIENT_IP']))  return $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))  return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))  return $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))  return $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))  return $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR'])) return $_SERVER['REMOTE_ADDR'];
    else return 'UNKNOWN';
}
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register | Fishy Foods</title>
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
		<script src="js/validateRegistration.js"></script>
        <script>
		 $(document).ready(function(){
            $("#box2").fadeIn();
         });
         new WOW(
            ).init();
        </script>
		<style>
		a:hover { color:#999999; }
		a:active { color:#999999; }
		a:visited { color:#999999; }
		*{max-width:100%;}
		button[type=submit]:disabled{opacity:0.5;}
		</style>
    </head>
    <body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-5">
                     <h1 align="right">Register Account</h1>
                </div>
				<div id="background-wrap">
					<div class="bubble x1"></div>
					<div class="bubble x2"></div>
					<div class="bubble x3"></div>
					<div class="bubble x4"></div>
					<div class="bubble x5"></div>
					<div class="bubble x6"></div>
					<div class="bubble x7"></div>
					<div class="bubble x8"></div>
					<div class="bubble x9"></div>
					<div class="bubble x10"></div>
				</div>
			</div>
			</br></br>
			<div class="text-fields wow fadeInDown" data-wow-delay="1s">
				<div id="login-box">
					<div class="logo">
						<h3 class="logo-caption">Let's register your Fishy Foods account.</h3>
					</div>
					<div class="controls">
						<form method='post' autocomplete="new-password">
							<?php
							for($i = 0; $i < sizeof($input); $i++){
								echo("<p align='left' style='font-size:16px;'>&nbsp;{$label[$i]}:</p>");
								$type = "text";
								if($input[$i] === "password")	$type = "password";
								if($input[$i] === "email")		$type = "email";
								if($input[$i] === "telephone")	$type = "tel";
								echo("<input type='$type' id='{$input[$i]}' name='{$input[$i]}' autofill='new-password' required placeholder='Enter your {$label[$i]}...' class='form-control'");
								if(isset($_POST[$input[$i]])) echo("value='{$_POST[$input[$i]]}' ");
								echo("/>");
							}
							?>
							
							</br><button type="submit" class="btn btn-default btn-block btn-custom" style="color:red;">
							<?php if(isset($errorMessage)) echo($errorMessage);
							else echo("Please enter your name.");?></button>
						</form>
						<div id='errorMessage'></div>
					</div>
					</br><p><a href="index.php">Already registered? Go back</a></p>
				</div>
			</div>
    </header>
    </body>
</html>
