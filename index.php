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
		<img id="print_button" src="images/print_up.png" onmousedown="printButtonDown();" onmouseup="printButtonUp();" />
	</div>
</body>

</html>