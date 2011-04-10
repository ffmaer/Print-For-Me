<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>printpuppy</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.js"></script>
	<script type="text/javascript" src="resources/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="resources/jquery/jquery.form.js"></script>
	
	<script type="text/javascript">
	
	$(document).ready(function() {
		
		var validator = $('#signup_form').validate({

			// submit action
			submitHandler: function(form) {
				$(form).ajaxSubmit();
				return false;
			},
			
			// error messages
			errorPlacement: function(error, element) {
				error.appendTo(element.prev());
			},

			// rules
			rules: {
				email: {
					required: true,
					email: true
				},
				password1: {
					required: true
				},
				password2: {
					required: true,
					equalTo: '#password1'
				}
			},
			
			// error messages
			messages: {
				email: {
					required: 'Email is required!',
					email: 'Invalid email address!'
				},
				password1: {
					required: 'Password is required!'
				},
				password2: {
					required: 'Password is required!',
					equalTo: 'Passwords must match!'
				}
			}
		});
			
	});
	
	</script>
</head>

<body>
	<div id="container">
		
		<h1>Sign Up</h1>
		
		<form name="signup_form" id="signup_form" method="post" action="signupRequest.php">

			<label>email address:</label>
			<input type="text" name="email" id="email" />
			<br />

			<label>password:</label>
			<input type="text" name="password1" id="password1" />
			<br />
			
			<label>re-enter password:</label>
			<input type="text" name="password2" id="password2" />
			<br />
			
			<input type="submit" value="submit" />
		</form>
		
		<hr />
		
		<a href="/">Print</a>
	</div>
</body>

</html>