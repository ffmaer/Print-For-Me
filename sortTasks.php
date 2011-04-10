<?php

require_once("config.php");

//sort by price
$tasks = $m->prints->buyers->find()->limit(20)->sort(array("price"=>1));

$tasks_price = 

while($tasks->hasNext()){
	$t=$tasks->getNext();
	echo "<tr>";
	    echo "<td>".$t["price"]."</td>";
	    echo "<td>".$t["price"]."</td>";
	    echo "<td>&nbsp;</td>";
	    echo '<td><input type="submit" value = "take"/></td>';
    echo "</tr>";
}
?>      
