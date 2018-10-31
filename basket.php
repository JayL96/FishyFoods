<!--	
	=======================
	basket.php
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file is for viewing the cart for an order within Fishy Foods and it requires a user to be logged in to use it.
	=======================
-->
<?php
	session_start();
	if(!isset($_SESSION['user'])) header("location: http://localhost/mysite/");	//Return to login page if not logged in.
	
	include_once("cart_config.php");
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Your Basket | Fishy Foods</title>
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
		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
		 $(document).ready(function(){
            $("#box2").fadeIn();
         });
         new WOW(
            ).init();
		 paypal.Button.render({
			env: 'sandbox',

			style: {
				label: 'checkout',
				size:  'small',
				shape: 'pill',
				color: 'blue',
				tagline: false
			},

			client: {
				sandbox: 'AVbhIp1RMwzkQsl4FBdn4dqMtfBT7tXfmbr5_PEe548mmfB_1J4ZUnzHUD6hBZe00wA1GJW7gWwgP2-4'
			},

			payment: function(data, actions) {
				return actions.payment.create({
					payment: {
						transactions: [
							{
								amount: { total: '0.01', currency: 'GBP' }
							}
						]
					}
				});
			},

			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function() {
					window.alert('Your order has been placed successfully!\nThank you for shopping with Fishy Foods!');
				});
			}

		}, '#basket_order');
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
		  <li><a class="active" href="products.php">Products</a></li>
		  <li><a href="contact-us.php">Contact Us</a></li>
		  <li style="float:right"><a href="logout.php">Log Out</a></li>
		  <li style="float:right;cursor:pointer;"><a href="account.php">Your Account</a></li>
		</ul>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-6" style="width:100%;">
						<h1>Your Basket</h1>
					</div>
				</div>
				</br></br></br></br></br></br></br></br></br>
				<div class="cart-view-table-back">
					<form method="post" action="cart_update.php">
					<table id="basket_products" width="100%" cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price (per quantity)</th><th>Total</th><th>Remove</th></tr></thead>
					<tbody>
						<?php
						if(isset($_SESSION["cart_products"]))
						{
							$total = 0;
							$b = 0;
							foreach ($_SESSION["cart_products"] as $cart_itm)
							{
								$product_name = $cart_itm["product_name"];
								$product_qty = $cart_itm["product_qty"];
								$product_price = $cart_itm["product_price"];
								$product_code = $cart_itm["product_code"];
								$subtotal = ($product_price * $product_qty);
								
								$bg_color = ($b++%2==1) ? 'odd' : 'even';
								echo '<tr class="'.$bg_color.'">';
								echo '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxLength="3" min="1" max="999" style="background-color:#6ca0c9;color:white;font-size:15px;width:75px;" class="form-control" name="product_qty['.$product_code.']" value="'.$product_qty.'"/></td>';
								echo '<td>'.$product_name.'</td>';
								echo '<td>'.$currency.$product_price.'</td>';
								echo '<td>'.$currency.$subtotal.'</td>';
								echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
								echo '</tr>';
								$total = ($total + $subtotal);
							}
							
							$grand_total = $total + $shipping_cost;
							foreach($taxes as $key => $value){
									$tax_amount     = round($total * ($value / 100));
									$tax_item[$key] = $tax_amount;
									$grand_total    = $grand_total + $tax_amount;
							}
							
							$list_tax = '';
							foreach($tax_item as $key => $value){
								$list_tax .= '<h5><span style="float:left;text-align: right;">'.$key. '<span style="float:right;text-align: right;">'. $currency. sprintf('%01.2f', $value).'</span>';
							}
							$shipping_cost = ($shipping_cost)?'<h5><span style="float:left;text-align: right;">Shipping </span><span style="float:right;text-align: right;">'.$currency. sprintf("%01.2f", $shipping_cost).'<br /></span>':'';
						}
						?>
						<tr><td colspan="5"><span style="float:right;text-align: right;"><?php if(count($_SESSION["cart_products"])>0) echo $shipping_cost. $list_tax. "<br>----------------------------------------------<br><span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span><b><span style='float:left;text-align: right;'>Order Total </span><span style='float:right;text-align: right;'>". $currency. sprintf('%01.2f', $grand_total);?></b></span></td></tr>
						<?php
							if(count($_SESSION["cart_products"]) >= 1) 
							{
								echo "<tr><td colspan='5'><button type='submit'>&#8635; Update Basket</button><a href='products.php' class='button' style='color:white;text-decoration:none;'>&#65291; Add More Products</a></td></tr>";
							}
						?>
						<?php 
							if(count($_SESSION["cart_products"]) < 1) 
								echo "<h4 style='text-align:center;'>Your basket is currently empty.<br><a href='products.php' style='color:cyan'>Why not take a look and purchase our delicious products?</a></h4><br><br>";
						?>
					  </tbody>
					</table>
					<input type="hidden" name="return_url" value="<?php 
					$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					echo $current_url; ?>" />
					</form>
					<?php
						if(count($_SESSION["cart_products"]) >= 1) 
						{
							echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
									<input type='hidden' name='cmd' value='_xclick'>
									<input type='hidden' name='business' value='orders@fishyfoods.org'>
									<input type='hidden' name='lc' value='GB'>
									<input type='hidden' name='item_name' value='Order from Fishy Foods'>
									<input type='hidden' name='amount' value='$grand_total'>
									<input type='hidden' name='currency_code' value='GBP'>
									<input type='hidden' name='button_subtype' value='services'>
									<input type='hidden' name='no_note' value='0'>
									<input type='hidden' name='bn' value='PP-BuyNowBF:btn_paynowCC_LG.gif:NonHostedGuest'>
									<input type='image' src='https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif' border='0' name='submit' alt='PayPal – The safer, easier way to pay online!'style='margin-left:632px;'>
									<img alt='' border='0' src='https://www.paypalobjects.com/en_GB/i/scr/pixel.gif' width='1' height='1'>
									</form>";
						}
					?>
				</div>
			</div>
		</header>
		<div class="footer">
			<p style="margin-top:3px;margin-left:8px;float:left;font-size:14px;">You're currently logged in as: <?= $_SESSION['user']['name']; ?> (<?= $_SESSION['user']['email']; ?>)</p>
			<p style="margin-right:5px;margin-top:8px;float:right;font-size:10px;">&copy 2018 - Fishy Foods.</p>
		</div>
    </body>
</html>