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
	
	
	<?php
		include('getVenueNameList.php');
	?>
	
	function clickVenue(venue)
	{
		$('#dropdown').hide();		
		
		$("#place").attr({ 
  		value: venue.value
  		});
  		
  		$("#place_id").attr({ 
  		value: venue.id
  		});
	}
		
	function checkList()
	{
		options=" ";
		counter =0;
		$('#dropdown').html(" ");
		$('#dropdown').show();
		if($('#place').attr('value').length>=1){
			for(i=0;i<list.length;i=i+1){
				if(counter <5){
					pattern = new RegExp($('#place').attr('value'), 'i');
					matches = list[i]['venue_name'].match(pattern);
					if(matches != null){
						options = options + '<input id="'+list[i]['venue_id']+'" onClick="clickVenue(this);" type=button value="'+list[i]['venue_name']+'"/><br/>';
						counter++;
					}
				}				
			}
		}
		$('#dropdown').html(options);
	}

	
	
	$(document).ready(function() {
		
		var validator = $('#print_form').validate({

/*
			// submit action
			submitHandler: function(form) {
				$(form).ajaxSubmit();
				return false;
			},
			
			// error messages
			errorPlacement: function(error, element) {
				error.appendTo(element.prev());
			},
*/

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
						
			<label>price to pay:</label>
			<input type="text" name="price" id="price" />
			<br />

			<label>place to meet:</label>
			<input type="text" id="place" name="place" onkeyup="checkList();" />
			<input type="hidden" name="place_id" id="place_id" />
			<div id="dropdown"></div>
			<br />

			<label>time to meet:</label>
			<input type="text" name="time" id="time" />
			<br />

			<label>file to print:</label>
			<input type="file" name="file" id="file" />
						
			
		</form>
		
		<hr />


		<?php
		
		if(isset($_SESSION['email'])){
			
			echo 'Hi! <a href="helpPrint.php">Help print?</a>';
			
		}
		else
		{
			echo '<a href="signup.php">Sign up</a> | <a href="signin.php">Sign in</a>';
		}
		
		?>
		
	</div>
</body>

</html>