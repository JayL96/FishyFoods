<?php
$request = [];
$request["valid"] = false;
if(isset($_POST['data'])){
  if(strlen($_POST['data']) >= 8){
    if(preg_match("/[a-z]/", $_POST['data'])){
      if(preg_match("/[A-Z]/", $_POST['data'])){
        if(preg_match("/[0-9]/", $_POST['data'])){
          $request['valid'] = true;
        } else $request['message'] = "Your password must contain at least 1 number.";
      } else $request['message'] = "Your password must contain at least 1 uppercase character.";
    } else $request['message'] = "Your password must contain at least 1 lowercase character.";
  } else $request['message'] = "Your password must be at least 8 characters long.";
} else $request['message'] = "Your password cannot be blank.";
echo json_encode($request);
?>
