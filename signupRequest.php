<?php

require_once("config.php");

$email = $_POST['email'];
$password = $_POST['password1'];

$obj = array(	"email"		=>	$email,
				"password"	=>	md5($password));

$m->prints->users->insert($obj);

session_start();
$_SESSION['email'] = $email;

echo '{"status_code":200, "message":"success!"}';