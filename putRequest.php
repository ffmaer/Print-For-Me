<?php
require_once("config.php");

$user_id = $_POST['user_id'];
$price = $_POST['price'];
$venue_id = $_POST['place_id'];
$unix_time = $_POST['time'];
$file_name = $_FILES['file']['name']; 
$file_type = $_FILES['file']['type'];

$m = new Mongo();

$db = $m->prints;
$grid = $db->getGridFS();
$tmp_name = $_FILES['file']['tmp_name'];
$file_id = $grid->storeFile($tmp_name); 

$obj = array(	 "user_id"		=>	$user_id,
				 "price"		=>	$price,
				 "venue_id"		=>	$venue_id,
				 "unix_time"	=>	$unix_time,
				 "file_name"	=>	$file_name,
				 "file_id"		=>	$file_id);

$collection = $m->prints->buyers;
$collection->insert($obj);



// download file
$image = $grid->findOne(array('name' => $file_name));
header('Content-type: '.$file_type);
header('Content-Disposition: attachment; filename='.$file_name);
readfile($file_name);
