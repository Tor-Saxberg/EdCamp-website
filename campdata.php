<?php 

$startX = 50;
$startY = 50;

include 'connect.php';
	$query = "SELECT camp, COUNT(*) as count  FROM camps, register WHERE camps.campID = register.campID GROUP by camp";
		$sql = $db->query($query) or trigger_error($db->error."[$sql2]");
		while( $rs = $sql->fetch_array(MYSQLI_ASSOC) ){
			$camp = $rs['camp'];
			$count = $rs['count'];

		// Append them as SVG into stocksstats.html file
			writeToSVGFile($camp, $count);
		}

	$db = null;
?> 




