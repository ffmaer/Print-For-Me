<?php
require_once("config.php");

$filename=$_GET['file_id'];

$db = $m->prints;
$grid = $db->getGridFS();
$image = $grid->findOne(array('_id' => $file_id));
header('Content-type: '.$file_type);
header('Content-Disposition: attachment; filename='.$file_name);
readfile($file_name);