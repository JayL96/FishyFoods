<!--	
	=======================
	index.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is the login page of Fishy Foods. 
	Users are given the ability to login, register (register.php) or reset their password (forgot.php).
	=======================
-->

<?php
  $error = "";
  $redirect = "http://localhost/mysite/home.php";
  if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['user']))  header("location: $redirect");	//This is needed so that if the user is already logged in it skips login.
	
	if(isset($_POST['user']) && isset($_POST['pass'])){  
    $c = mysqli_connect('localhost','root','','test');
    if(!$c) die("Database Connection Error: " . mysqli_connect_error());
      $email = mysqli_real_escape_string($c, $_POST['user']);
      $pass = md5($_POST['pass']);
      $login = mysqli_query($c, "SELECT * FROM users WHERE email='$email'");
      if(!$login) die("Login Error: " . mysqli_error($c));
      if($login->num_rows > 0){
        $user = mysqli_fetch_assoc($login);
        if($pass === $user['password']){
          $_SESSION['user'] = $user;
          header("location: $redirect");
        } else $error = "Login failed: Invalid email address or password.";
      } else $error = "Login failed: Invalid email address or password.";
    mysqli_close($c);
}
  function checkhashSSHA($salt, $password) {
    return base64_encode(sha1($password . $salt, true) . $salt);
  }
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | Fishy Foods</title>
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
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <h1>Login</h1>
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
			</br></br></br></br>
			<form method="post" class="text-fields wow fadeInDown" data-wow-delay="1s">
				<div id="login-box">
					<div class="logo">
						<h3 class="logo-caption">Enter the details to your Fishy Foods account.</h3>
					</div>
					<div class="controls">
						<p align="left" style="font-size:16px">Email Address:</p>
						<input type="email" id="user" name="user" placeholder="Enter your email address..." class="form-control" required="required">
						</br><p align="left" style="font-size:16px">Password:</p>
						<input type="password" id="pass" name="pass" placeholder="Enter your password..." class="form-control" required="required" />
						</br><button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
						<p align="center" style="<?php if($error !== "") echo("color:#990000;"); ?>"><?php if($error !== "") echo($error); ?></p>
					</div>
					</br>
					<p><a href="register.php">Don't have an account yet?</a></p>
				</div>
           </form>
		  </div>
    </header>
    </body>
</html>
