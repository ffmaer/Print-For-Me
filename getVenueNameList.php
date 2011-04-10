<?php

require_once("config.php");

$venues = $m->prints->venues->find()->limit(500);
$list=array();
while($venues->hasNext())
{
	$v = $venues->getNext();		
	array_push($list,$v);
}
echo json_encode($list, JSON_FORCE_OBJECT);