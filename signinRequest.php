<?php

require_once("config.php");

$email = $_POST['email'];
$password = $_POST['password'];

$user = $m->prints->users->findOne(array("email" => $email));

if($user['password']==md5($password))
{
	session_start();
	$_SESSION['email'] = $email;
	echo '{"status_code":200, "message":"success!"}';

}
