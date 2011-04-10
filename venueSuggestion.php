
<html>

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
	
	function checkList()
	{
		options=" ";
		counter =0;
		$('#dropdown').html(" ");
		if($('#place').attr('value').length>=1){
			for(i=0;i<list.length;i=i+1){
				if(counter <5){
					pattern = new RegExp($('#place').attr('value'), 'i');
					matches = list[i]['venue_name'].match(pattern);
					if(matches != null){
						options = options + '<input type=button value="'+list[i]['venue_name']+'"/><br/>';
						counter++;
					}
				}				
			}
		}
		$('#dropdown').html(options);
	}
	
	
	</script>
</head>



<body>


<input type="text" id="place" name="place" onkeyup="checkList();" />
<div id="dropdown"></div>


</body>
</html>