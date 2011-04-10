<?php
require_once("config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$obj = array(	 "username"		=>	$username,
				 "password"		=>	$password );

$collection = $m->prints->users;
$collection->insert($obj);