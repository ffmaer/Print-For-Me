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
	
	function ajaxResponseHandler(response, status)
	{
		$('#response').html(response.message)
		$('#response').modal({
			modal: false,
			escClose: true
		});
		if (response.status_code == 200)
			setTimeout('window.location = "index.php";', 2000);
		else
			setTimeout('$("#response").css("display", "none");', 2000);
	}
	
	$(document).ready(function() {
		
		var validator = $('#signin_form').validate({

			// submit action
			submitHandler: function(form) {
				$(form).ajaxSubmit({
					dataType: 'json',
					success: ajaxResponseHandler
				});
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
				password: {
					required: true
				}
			},
			
			// error messages
			messages: {
				email: {
					required: 'Email is required!',
					email: 'Invalid email address!'
				},
				password: {
					required: 'Password is required!'
				}
			}
		});
			
	});
	
	</script>
</head>

<body>
	<div id="response"></div>
	
	<div id="container">
		
		<h1>Sign In</h1>
		
		<form name="signin_form" id="signin_form" method="post" action="signinRequest.php">

			<label>email address:</label>
			<input type="text" name="email" id="email" />
			<br />

			<label>password:</label>
			<input type="text" name="password" id="password" />
			<br />
			
			<input type="submit" value="submit" />
		</form>
		
		<hr />
		
		<a href="/">Print</a>
	</div>
</body>

</html>