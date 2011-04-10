<!doctype html>
<html lang="en">

<head>
	<title>printpuppy</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<script type="text/javascript" src="resources/jquery/jquery-1.5.2.min.js"></script>
	
	<script type="text/javascript">
	
	$(document).ready(function() {
		
	});
	
	function printButtonDown() {
		$('#print_button').attr('src', 'images/print_down.png');
	}
	
	function printButtonUp() {
		$('#print_button').attr('src', 'images/print_up.png');
	}
	
	</script>
</head>

<body>
	<div id="container">
		
		<form name="print_form" id="print_form" method="post" action="putRequest.php" enctype="multipart/form-data">

			<label>price:</label>
			<input type="text" name="price"/>
			<br />

			<label>place:</label>
			<input type="text" name="place"/>
			<br />

			<label>time:</label>
			<input type="text" name="time"/>
			<br />

			<label>file:</label>
			<input type="file" name="file" id="file" />
			<br />

			<input type="image" id="print_button" src="images/print_up.png" onmousedown="printButtonDown();" onmouseup="printButtonUp();" onmouseout="printButtonUp();" />
		</form>
		
		<form id="signup_form" action="signUp.php" method="post" enctype="multipart/form-data">

			<label>username:</label>
			<input type="text" name="username"/>
			<br />

			<label>password1:</label>
			<input type="text" name="password1"/>
			<br />

			<label>password2:</label>
			<input type="text" name="password2"/>
			<br />

			<input type="submit" value = "sign up"/>
		</form>
		
	</div>
</body>

</html>