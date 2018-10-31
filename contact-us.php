<!--	
	=======================
	contact-us.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is for contacting Fishy Foods.
	=======================
-->
<?php
	if(!isset($_SESSION)) session_start();
	if(!isset($_SESSION['user'])) header("location: http://localhost/mysite/");	//Return to login page if not logged in.
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Contact Us | Fishy Foods</title>
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
			a:hover { color:#999999; }
			a:active { color:#999999; }
			a:visited { color:#999999; }
			*{max-width:100%;}
		</style>
    </head>
    <body>
		<ul id="nav">
		  <li><a href="home.php">Home</a></li>
		  <li><a href="products.php">Products</a></li>
		  <li><a class="active" href="#">Contact Us</a></li>
		  <li style="float:right"><a href="logout.php">Log Out</a></li>
		  <li style="float:right;cursor:pointer;"><a href="account.php">Your Account</a></li>
		</ul>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-6" style="width:100%;">
						<h1>Contact Us</h1>
					</div>
				</div>
				</br></br></br></br></br></br></br></br>
				<form method="POST" class="text-fields wow" data-wow-delay="1s">
					<div id="contact-box">
						<div class="logo">
							<h3 class="logo-caption">Need support or just want to give feedback? Fill in the fields below and we'll get back to you as soon as we can.</h3>
						</div>
						<div class="controls">
							<p align="left" style="font-size:16px">Subject:</p>
							<input type="text" name="contact-subject" placeholder="Enter a subject for your message..." class="form-control" required="required">
							</br><p align="left" style="font-size:16px">Your Message:</p>
							<textarea name="contact-msg" placeholder="Enter your message..." class="contact-msg" required></textarea>
							</br></br><button type="submit" name="contact-submit" class="btn btn-default btn-block btn-custom">Submit</button>
							<?php
								if(isset($_POST['contact-submit'])){
									$name=$_SESSION['user']['name'];
									$email=$_SESSION['user']['email'];
									$msg=$_POST['contact-msg'];

									$to='jaylaidlaw@gmail.com';
									$subject='New Message | Fishy Foods';
									$message="Name :".$name."\n"."\n\n".$msg;
									$headers="From: ".$email;

									if(mail($to, $subject, $message, $headers)){
										echo "<h3 align='center' style='color:#56f2a6'>Thank you, an email has been sent successfully. We will get back to you as soon as we can!</h3>";
									}
									else{
										echo "<h3 align='center' style='color:#ff0000'>Oops, an error has occured. Please try again.</h3>";
									}
								}
							?>
						</div>
					</div>
				</form>
			</div>
		</header>
		<div class="footer">
			<p style="margin-top:3px;margin-left:8px;float:left;font-size:14px;">You're currently logged in as: <?= $_SESSION['user']['name']; ?> (<?= $_SESSION['user']['email']; ?>)</p>
			<p style="margin-right:5px;margin-top:8px;float:right;font-size:10px;">&copy 2018 - Fishy Foods.</p>
		</div>
    </body>
</html>
