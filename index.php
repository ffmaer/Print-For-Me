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
		
		var validator = $('#print_form').validate({

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
				price: {
					required: true
				},
				place: {
					required: true
				},
				time: {
					required: true
				},
				file: {
					required: true
				}
			},
			
			// error messages
			messages: {
				price: {
					required: 'Price is required!'
				},
				place: {
					required: 'Place is required!'
				},
				time: {
					required: 'Time is required!'
				},
				file: {
					required: 'File is required!'
				}
			}
		});
			
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

			<input type="image" id="print_button" src="images/print_up.png" onmousedown="printButtonDown();" onmouseup="printButtonUp();" />
			
			<label>price:</label>
			<input type="text" name="price" id="price" />
			<br />

			<label>place:</label>
			<input type="text" name="place" id="place" />
			<br />

			<label>time:</label>
			<input type="text" name="time" id="time" />
			<br />

			<label>file:</label>
			<input type="file" name="file" id="file" />
		</form>
		
		<hr />
		
		<a href="">Sign up</a> | <a href="">Sign in</a>
	</div>
</body>

</html>