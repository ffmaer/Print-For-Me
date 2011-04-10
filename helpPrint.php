<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>printpuppy</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	
</head>

<body>
	<div id="container">
	<img src="logo.png" alt="logo" width="381" height="297" />
	<br />
	<table width="500" border="0" cellspacing="0" cellpadding="0" >
	  <tr>
	    <td ><input type="submit" value = "sort by price (dollars)"/></td>
	    <td ><input type="submit" value = "sort by distance (km)"/></td>
	    <td ><input type="submit" value = "sort by time (hour)"/></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
<?php
date_default_timezone_set('America/New_York');
require_once("config.php");

$venues = $m->prints->venues->find()->limit(500);
while($venues->hasNext())
{
	$v = $venues->getNext();
	$vs[$v['venue_id']]=array($v['lat'],$v['lng']);
}

$tasks = $m->prints->buyers->find()->limit(20);

$counter=0;
while($tasks->hasNext()){
	$t=$tasks->getNext();
	$ts[$counter]['price']=$t['price'];
	$ts[$counter]['distance']="<span id='p".$counter."'>".$vs[$t['place_id']][0].",".$vs[$t['place_id']][1]."</span>";
	$datetime1 = date_create(gmDate("Y-m-d")." ".$t['unix_time']);
	$datetime2 = date_create(date("Y-m-d G:i"));     
	$i = date_diff($datetime1, $datetime2);
	$ts[$counter]['hours']=round($i->h+$i->i/60);
	$ts[$counter]['file']=$t['file_id'];;
			
			
			
					
	echo "<tr>";
	    echo "<td bgcolor='#66CCFF'>".$ts[$counter]['price']."</td>";
	    echo "<td bgcolor='#FFFF00'>".$ts[$counter]['distance']."</td>";
	    echo "<td bgcolor='#66CCFF'>".$ts[$counter]['hours']."</td>";
	    echo "<td bgcolor='#66CCFF'><a href='download.php?file_id=".$ts[$counter]['file']."'><img src='download.png' /></a></td>";
	    echo '<td><input type="submit" value = "take"/></td>';
    echo "</tr>";
    
    $counter++;
}


?>





</table>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.js"></script>
	<script type="text/javascript" src="resources/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="resources/jquery/jquery.form.js"></script>
	
	<script type="text/javascript">
	
	for(i=0;i<$("span").size();i=i+1){
		$("#p"+i).hide();
	}
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
	  
	  mylat =position.coords.latitude;
	  mylng =position.coords.longitude;

	  for(i=0;i<$("span").size();i=i+1){
			$("#p"+i).html(a(mylat,mylng,$("#p"+i).html().split(",")[0],$("#p"+i).html().split(",")[1]));
			$("#p"+i).show();
		}

	  
	  });
	}
	else {
	  if (document.getElementById("GeoAPI")) {
	    document.getElementById("GeoAPI").innerHTML = "I'm sorry but geolocation services are not supported by your browser";
	    document.getElementById("GeoAPI").style.color = "#FF0000";
	  }
	}
	
	
	
	
function a(lat1,lon1,lat2,lon2){
	


	var R = 6371; // km
	var d = Math.acos(Math.sin(lat1)*Math.sin(lat2) + 
                  Math.cos(lat1)*Math.cos(lat2) *
                  Math.cos(lon2-lon1)) * R;
/*     return "a"; */
	return Math.round(d);
}	




	
</script>

<hr />


	<?php
			echo '<a href="index.php">Print?</a>';
			

		?>

</div>
</body>
</html>

	