<?php
require_once("config.php");

$filename=$_GET['filename'];

$db = $m->prints;
$grid = $db->getGridFS();
$image = $grid->findOne(array('name' => $file_name));
header('Content-type: '.$file_type);
header('Content-Disposition: attachment; filename='.$file_name);
readfile($file_name);