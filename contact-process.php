<!--	
	=======================
	contact-process.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is for contacting Fishy Foods.
	=======================
-->
<?php
	if(!isset($_SESSION)) session_start();
	if(isset($_POST['contact-submit'])){
		$name=$_SESSION['user']['name'];
		$email=$_SESSION['user']['email'];
		$msg=$_POST['contact-msg'];

		$to='jaylaidlaw@gmail.com';
		$subject='New Message | Fishy Foods';
		$message="Name :".$name."\n"."\n\n".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1 align='center' style='color:#56f2a6'>Thank you, an email has been sent successfully. We will get back to you as soon as we can!</h1>";
		}
		else{
			echo "<h1 align='center' style='color:#ff0000'>Oops, an error has occured. Please try again.</h1>";
		}
	}
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
    </head>
    <body>
		
    </body>
</html>