<?php 

$startX = 50;
$startY = 50;

include 'connect.php';
	$query = "SELECT DISTINCT item, SUM(count) as count FROM payment, items WHERE payment.itemID = items.itemID GROUP BY item";
		$sql = $db->query($query) or trigger_error($db->error."[$sql2]");
		while( $rs = $sql->fetch_array(MYSQLI_ASSOC) ){
			$item = $rs['item'];
			$count = $rs['count'];

		// Append them as SVG into stocksstats.html file
			writeToSVGFile($item,$count);
		}

	$db = null;
?> 