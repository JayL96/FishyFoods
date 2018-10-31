<?php
$request = [];
$request["valid"] = false;
if(isset($_POST['data'])){
	if(strlen($_POST['data']) >= 10){
		if(preg_match("/^[\+0-9\-\(\)\s]*$/", $_POST['data'])){
			$c = mysqli_connect('localhost', 'root', '', 'test');
			if(!$c) $request['message'] = "Database Connection Error: " . mysqli_connect_error();
			$tel = mysqli_real_escape_string($c, $_POST['data']);
			$q = mysqli_query($c, "SELECT * FROM users WHERE telephone='$tel'");
			if(!$q) $request['message'] = "Phone number Check Error: " . mysqli_error($c);
			if($q->num_rows > 0)  $request['message'] = "This number is already registered.";
			else $request['valid'] = true;
		}
	} else $request['message'] = "Please enter a valid telephone number.";
} else $request['message'] = "Please enter your telephone number.";
echo json_encode($request);
?>