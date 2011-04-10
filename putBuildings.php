<?php
require_once("config.php");

$data=file_get_contents("building.txt");
$data = split("\n",$data);
foreach($data as $k => $d){
	$data[$k] = split(",",$data[$k]);
}

$collection = $m->prints->venues;
foreach($data as $d){
	$obj = array(	"venue_name"	=>	$d[0],
					"venue_id"		=>	$d[1],
					"lat"		=>	$d[2],
					"lng"		=>	$d[3]);
	$collection->insert($obj);
	echo ".";
}