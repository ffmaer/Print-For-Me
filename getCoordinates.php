<?php
require_once("config.php");

$data = file_get_contents("building.txt");

$data = split("\n",$data);

foreach($data as $k => $d){
	$data[$k] = split(",",$data[$k]);
}


foreach($data as $d){
	$json=file_get_contents("https://api.foursquare.com/v2/venues/".$d[1]."?oauth_token=33SKOTQ5D2EXYHBA2EPCWVJ5PYVTOSYJRHRC2UI1UR1SYQX1");
	$json = json_decode($json);
	$lat = $json->response->venue->location->lat;
	$lng = $json->response->venue->location->lng;
	echo $d[0].",".$d[1].",".$lat.",".$lng."<br />";
}