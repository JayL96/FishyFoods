<!--	
	=======================
	products.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is all of the products within Fishy Foods.
	=======================
-->
<?php
	session_start();
	if(!isset($_SESSION['user'])) header("location: http://localhost/mysite/");	//Return to login page if not logged in.
	
	include_once("cart_config.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Products | Fishy Foods</title>
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
		  <li><a class="active" href="#">Products</a></li>
		  <li><a href="contact-us.php">Contact Us</a></li>
		  <li style="float:right"><a href="logout.php">Log Out</a></li>
		  <li style="float:right;cursor:pointer;"><a href="account.php">Your Account</a></li>
		</ul>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-6" style="max-width:100%;">
						<h1>Products</h1>
						<br>
					</div>
				</div>
				</br></br></br></br></br></br></br></br>
						<?php
							if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
							{
								echo '<div class="cart-view-table-front" id="view-cart">';
								echo '<h3>Your Basket</h3>';
								echo '<form method="post" action="cart_update.php">';
								echo '<table width="350px;"  cellpadding="6" cellspacing="0">';
								echo '<tbody>';

								$total =0;
								$b = 0;
								foreach ($_SESSION["cart_products"] as $cart_itm)
								{
									$product_name = $cart_itm["product_name"];
									$product_qty = $cart_itm["product_qty"];
									$product_price = $cart_itm["product_price"];
									$product_code = $cart_itm["product_code"];
									$bg_color = ($b++%2==1) ? 'odd' : 'even';
									echo '<tr class="'.$bg_color.'">';
									echo '<td>'.$product_name.'</td>';
									echo '<td>Quantity: <input type="number" id="quantity_products" oninput="this.value=this.value.slice(0,this.maxLength)" maxLength="3" min="1" max="999" style="background-color:#6ca0c9;color:white;font-size:15px;width:70px;margin-bottom:5px;" class="form-control" name="product_qty['.$product_code.']" value="'.$product_qty.'"/></td>';
									echo '<td><input type="checkbox" name="remove_code[]" style="margin-right:45%;" value="'.$product_code.'" /> Remove</td>';
									echo '</tr>';
									$subtotal = ($product_price * $product_qty);
									$total = ($total + $subtotal);
								}
								echo '<td colspan="4">';
								echo '<a href="basket.php" class="button" style="color:white;text-decoration:none;">&#128722; Go to Checkout</a><button type="submit">&#8635; Update Basket</button>';
								echo '</td>';
								echo '</tbody>';
								echo '</table>';
								
								$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
								echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
								echo '</form>';
								echo '</div>';
							}
						?>
					
						<?php
							$results = $mysqli->query("SELECT product_code, product_name, product_image, product_price FROM products ORDER BY product_id ASC");
							if($results){ 
								$products_item = '<ul class="products">';
								while($obj = $results->fetch_object())
								{
									$products_item .= <<<EOT
									<li class="product">
									<form method="post" action="cart_update.php">
									<div class="product-content"><h4>{$obj->product_name}</h4>
									<div class="product-thumb"><img src="images/{$obj->product_image}"></div>
									<div class="product-info">
									<h4>Price: <i>{$currency}{$obj->product_price}</i></h4> 
									<h4>Quantity: <input type="number" id="quantity_products" oninput="this.value=this.value.slice(0,this.maxLength)" maxLength="3" min="1" max="999" name="product_qty" style="background-color:#6ca0c9;color:white;font-size:15px;width:73px;text-align:center;" class="form-control" required></h4>
									<input type="hidden" name="product_code" value="{$obj->product_code}" />
									<input type="hidden" name="type" value="add" />
									<input type="hidden" name="return_url" value="{$current_url}" />
									<div align="center"><button type="submit" class="add_to_cart" style="margin-bottom:8px;">Add to Basket</button></div>
									</div></div>
									</form>
									</li>
EOT;
								}
								$products_item .= '</ul>';
								echo $products_item;
							}
						?>    
			</div>
		</header>
		<div class="footer">
			<p style="margin-top:3px;margin-left:8px;float:left;font-size:14px;">You're currently logged in as: <?= $_SESSION['user']['name']; ?> (<?= $_SESSION['user']['email']; ?>)</p>
			<p style="margin-right:5px;margin-top:8px;float:right;font-size:10px;">&copy 2018 - Fishy Foods.</p>
		</div>
    </body>
</html>
