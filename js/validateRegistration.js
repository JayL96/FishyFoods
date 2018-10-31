/*	=======================
	validateRegistration.js
	by Jamie Laidlaw
	
	Made for Assignment 2 of the Advanced Web Development Unit.
	
	Description:
	This file validates the text fields located on the registration page (register.php).
	=======================
*/

$(document).ready(function(){
	 $("button[type=submit]").attr("disabled", "disabled");
	window.defaultcol = $('#password').css("background-color");
	$('div.controls form input').each(function(){
	// Check on key up
	$(this).data("valid", false);
		$(this).keyup(validate);
	});
});
function validate(){
	var id = $(this).attr("id");
	if($(this).val != ""){
		//We only need to post php to email, password and telephone fields
		if(id == "email" || id == "password" || id == "telephone"){
			$.post("http://localhost/mySite/Validate/" + id + "/", {data: $(this).val()}, function(data){
				if(data.valid){
					// alert("Ay niga it works.");
					$('#' + id).css("background-color", "green");
				} else {
					$('button[type=submit]').text(data.message);
					$('#' + id).css("background-color", "#8b0000");
				}
			}, 'JSON');
		} else if(id == 'postcode'){
			if($(this).val().length >= 5){
				$('#' + id).css("background-color", "green");
			} else {
				$('#' + id).css("background-color", "#8b0000");
			}
		} else {
			if($(this).val().length >= 3){
				$('#' + id).css("background-color", "green");
			} else {
				// $('button[type=submit]').text("");
				$('#' + id).css("background-color", "#8b0000");
			}
		}
	} else {
		//Empty Value Response: Please enter * THIS FIELD NAME *
			$('button[type=submit]').text("Please enter your " + $(this).attr("id"));
			$('#' + $(this).attr("id")).css("background-color", "#8b0000");
	}
	if($("#name").val() == "") $('button[type=submit]').text("Please enter your name.");
	else if($("#email").val() == "") $('button[type=submit]').text("Please enter your email address.");
	else if($("#password").val() == "") $('button[type=submit]').text("Please enter your password.");
	else if($("#postcode").val() == "") $('button[type=submit]').text("Please enter your postcode.");
	else if($("#address").val() == "") $('button[type=submit]').text("Please enter your address.");
	else if($("#city").val() == "") $('button[type=submit]').text("Please enter your city.");
	else if($("#telephone").val() == "") $('button[type=submit]').text("Please enter your telephone number.");
	
	if($("#name").css("background-color") == "rgb(0, 128, 0)" && $("#email").css("background-color") == "rgb(0, 128, 0)" && 
	$("#password").css("background-color") == "rgb(0, 128, 0)" && $("#postcode").css("background-color") == "rgb(0, 128, 0)" && 
	$("#address").css("background-color") == "rgb(0, 128, 0)" && $("#city").css("background-color") == "rgb(0, 128, 0)" && 
	$("#telephone").css("background-color") == "rgb(0, 128, 0)"){
		//Enable Button
		$("button[type=submit]").removeAttr("disabled");
		$("button[type=submit]").text("Register");
		$("button[type=submit]").css("color", "white");
	} else {
		//Disable Button
		$("button[type=submit]").attr("disabled", "disabled");
		$("button[type=submit]").css("color", "red");
	}
}




function validate_old(){
	var id = $(this).attr("id");
		if($(this).val() != ""){
			// Only check if any of the fields aren't blank
			if(id == "regUser" || id == "regPassword"){
				var url = "http://localhost/mySite/Validation/" + id.replace("reg", "") + ".php";
				$.post(url,{data: $(this).val()}, function(data){
          if(data.valid){
              // Indicate the fields are valid
			  //$('#errorMessage').text("");
			  $('#' + id).css("background-color", "green");
			  if(id == "user"){
				  if($('#password').val() == "")
					  $("button[type=submit]").text("Please enter a password.");
			  }
          }else{
              // Indicate the fields aren't valid
			  $('button[type=submit]').text(data.message);
			  $('#' + id).css("background-color", "#8b0000");
          }
       }, 'JSON');
			} else {
				if($(this).val() != $('#regPassword').val()){
					//Display an error message if the Password and Confirm Password fields don't match
					$('button[type=submit]').text("Your passwords do not match.");
					$('#' + id).css("background-color", "#8b0000");
				} else {
					$('button[type=submit]').text("Please confirm your password.");
					$('#' + id).css("background-color", "green");
				}
			}
		} else {
			// Reset any error messages and the background color when any of the fields are empty
			if(id == "regUser")	$('button[type=submit]').text("Please enter a username.");
			else if(id == "regPassword") $('button[type=submit]').text("Please enter a password.");
			else $('button[type=submit]').text("Please confirm your password.");
			$('#' + id).css("background-color", window.defaultcol);
		}
	if($('#regUser').css("background-color") == "rgb(0, 128, 0)" 
		&& $('#regPassword').css("background-color") == "rgb(0, 128, 0)" 
		&& $('#regConfirmPassword').css("background-color") == "rgb(0, 128, 0)"){
			$("button[type=submit]").removeAttr("disabled");
			$("button[type=submit]").text("Register");
			$("button[type=submit]").css("color", "white");
		}
	else {
		$("button[type=submit]").attr("disabled", "disabled");
		$("button[type=submit]").css("color", "red");
	}
}