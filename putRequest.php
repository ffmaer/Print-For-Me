<?php

session_start();
require_once("config.php");

$email = $_SESSION['email'];
$price = $_POST['price'];
$place_id = $_POST['place_id'];
$unix_time = $_POST['time'];
$file_name = $_FILES['file']['name']; 
$file_type = $_FILES['file']['type'];

$db = $m->prints;
$grid = $db->getGridFS();
$tmp_name = $_FILES['file']['tmp_name'];
$file_id = $grid->storeFile($tmp_name); 

$obj = array(	 "email"		=>	$email,
				 "price"		=>	$price,
				 "place_id"		=>	$place_id,
				 "unix_time"	=>	$unix_time,
				 "file_name"	=>	$file_name,
				 "file_id"		=>	$file_id);

$collection = $m->prints->buyers;
$collection->insert($obj);

echo 'Hi! <a href="javascript:history.back();">Print more?</a>';