<?php
$request = [];
$request["valid"] = false;
if(isset($_POST['data'])){
	if(filter_var($_POST['data'], FILTER_VALIDATE_EMAIL)){
		$c = mysqli_connect('localhost', 'root', '', 'test');
		if(!$c) $request['message'] = "Database Connection Error: " . mysqli_connect_error();
		$email = mysqli_real_escape_string($c, $_POST['data']);
		$q = mysqli_query($c, "SELECT * FROM users WHERE email='$email'");
		if(!$q) $request['message'] = "Email Validate Error: " . mysqli_error($c);
		if($q->num_rows > 0)  $request['message'] = "This email address is already registered.";
		else $request['valid'] = true;
	} $request['message'] = "Please enter a valid email address.";
} else $request['message'] = "Your email address cannot be blank.";
echo json_encode($request);
?>