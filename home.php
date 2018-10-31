<!--	
	=======================
	home.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is the home page of Fishy Foods and requires a user to be logged in to use it.
	=======================
-->
<?php
	session_start();
	if(!isset($_SESSION['user'])) header("location: http://localhost/mysite/");	//Return to login page if not logged in.
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home | Fishy Foods</title>
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
			
			.item-1, 
			.item-2, 
			.item-3,
			.item-4 {
				position: fixed;
				display: inline-block;
				width: 100%;
				float: left;
				font-size: 18px;
				font-style: italic;
				animation-duration: 40s;
				animation-timing-function: ease-in-out;
				animation-iteration-count: infinite;
			}

			.item-1{
				animation-name: anim-1;
			}

			.item-2{
				animation-name: anim-2;
			}

			.item-3{
				animation-name: anim-3;
			}
			
			.item-4{
				animation-name: anim-4;
			}

			@keyframes anim-1 {
				0%, 8.3% { left: -100%; opacity: 0; }
			  8.3%,25% { left: 25%; opacity: 1; }
			  33.33%, 100% { left: 110%; opacity: 0; }
			}

			@keyframes anim-2 {
				0%, 33.33% { left: -100%; opacity: 0; }
			  41.63%, 58.29% { left: 25%; opacity: 1; }
			  66.66%, 100% { left: 110%; opacity: 0; }
			}

			@keyframes anim-3 {
				0%, 66.66% { left: -100%; opacity: 0; }
			  74.96%, 91.62% { left: 25%; opacity: 1; }
			  100% { left: 110%; opacity: 0; }
			}
			
			@keyframes anim-4 {
				0%, 66.66% { left: -100%; opacity: 0; }
			  74.96%, 91.62% { left: 25%; opacity: 1; }
			  100% { left: 110%; opacity: 0; }
			}
		</style>
    </head>
    <body>
		<ul id="nav">
		  <li><a class="active" href="home.php">Home</a></li>
		  <li><a href="products.php">Products</a></li>
		  <li><a href="contact-us.php">Contact Us</a></li>
		  <li style="float:right"><a href="logout.php">Log Out</a></li>
		  <li style="float:right;cursor:pointer;"><a href="account.php">Your Account</a></li>
		</ul>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-6" style="width:100%;">
						<h1>Home</h1>
					</div>
				</div>
				</br></br></br></br>
				<h3 style="text-align:center;"><b>Welcome to Fishy Foods!</b></h3></br></br><h4 style="text-align:center;">We are a company that specialize in fish <font size="2"><i>(just in case you didn't know that by now!)</i></font></br>We love providing our amazing fish products to the world and we are committed to provide 100% customer satisfaction to all of our customers!</br>To take a look at our great selection of seafood, you can either use the navigation bar at the top of the page or simply click <a href="products.php" style="color:cyan">here</a>.</br>As a quick heads up, you can view your account by either clicking the 'Your Account' button at the top right of the page or just <a href="account.php" style="color:cyan">here</a>.</h4></br></br><h2 style="text-align:center;">We offer FREE delivery on all orders!</h2><h4 style="text-align:center;"></br></br></br>Below are just some of our testimonials:</h4>
				<p class="item-1">"If any of the items are out of stock, I always know that there are plenty more fish in the sea at Fishy Foods!"</p>
				</br><p class="item-1" align="middle">- A Local Fishmonger</p>
				<p class="item-2">"The seafood here is amazing! Let me tell you, if I were a fish, I'd be telling Nemo and his friends how amazing Fishy Foods really is!"</p>
				</br><p class="item-2" align="middle">- Gordon Ramsey</p>
				<p class="item-3">"Fishy Foods is a fantastic service! The staff are very friendly and the food is great! What more could you fish for?"</p>
				</br><p class="item-3" align="middle">- Daily Mail</p>
				<p class="item-4">"Fishy Foods offers absolutely delicious seafood and the prices are great too. Highly recommended!"</p>
				</br><p class="item-4" align="middle">- The Fish Gurus</p>
				</br></br></br></br></br></br></br></br>
				<h4 style="text-align:center;">Have any feedback or need any support? You can contact us through our fancy email system <a href="contact-us.php" style="color:cyan">here</a>. Alternatively, you can just use the navigation bar.</h4>
			</div>
		</header>
		<div class="footer">
			<p style="margin-top:3px;margin-left:8px;float:left;font-size:14px;">You're currently logged in as: <?= $_SESSION['user']['name']; ?> (<?= $_SESSION['user']['email']; ?>)</p>
			<p style="margin-right:5px;margin-top:8px;float:right;font-size:10px;">&copy 2018 - Fishy Foods.</p>
		</div>
    </body>
</html>
