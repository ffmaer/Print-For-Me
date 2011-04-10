<?php

require_once("config.php");

$venues = $m->prints->venues->find()->limit(500);
$list=array();
while($venues->hasNext())
{
	$v = $venues->getNext();		
	array_push($list,array('venue_name'=>addslashes($v['venue_name']),'venue_id'=>$v['venue_id']));
	
}
echo "var list=".json_encode($list).";";

