<?php
$request = [];
$request["valid"] = false;
if(isset($_POST['data'])){
  if(strlen($_POST['data']) >= 3){
    if (!preg_match('/[^A-Za-z0-9]/', $_POST['data'])){
      $c = mysqli_connect('localhost', 'root', '', 'test');
      if(!$c) $request['message'] = "Database Connection Error: " . mysqli_connect_error();
      $name = mysqli_real_escape_string($c, $_POST['data']);
      $q = mysqli_query($c, "SELECT * FROM users WHERE name='$name'");
      if(!$q) $request['message'] = "Username Check Error: " . mysqli_error($c);
      if($q->num_rows > 0)  $request['message'] = "Sorry, that username is already taken.";
      else $request['valid'] = true;
    } else $request['message'] = "Your username can only contain alphanumeric characters.";
  } else $request['message'] = "Your username must be a minimum of 3 characters long.";
} else $request['message'] = "Your username cannot be blank.";
echo json_encode($request);
?>