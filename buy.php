
<?php

	if (isset($_POST)){
		$child = $_POST['child'];
		$parent_count = $_POST['parent_count'];
		$duration = $_POST['duration'];
		$card = $_POST['card'];
		$cvv = $_POST['cvv'];
		$price = preg_replace("/[^0-9]/","",$_POST['price']) ;
			$price = (1 - $parent_count * 0.1) * $price;
			if ($price <= 0){ 
				$price = 1;
			}
		$drop = $_POST['drop'];
		$type_camps = 0;
		$type_items = 0;
		if(isset($_POST['type-camps'])){
			$type_camps = 1;
			$price = $price * $duration;
			$camp = $_POST['camp'];
		}
		if(isset($_POST['type-items'])){
			$type_items = 1;
			$item = $_POST['item'];
		}
	}

	include 'connect.php';

	$result = 0;

	$query = "SELECT childID FROM children where child = '$child' ";
	$sql = $db->query($query) or trigger_error($db->error."[$sql]");
	$rs = $sql->fetch_array(MYSQLI_ASSOC);
	if (!$childID = $rs['childID']) {
		$response = "couldn't find an account for $child";
		die(print json_encode($response));
	}

// for camps

	if($type_camps){
						// get for campID
		$query = "SELECT campID FROM camps where camp = '$camp' ";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
		$rs = $sql->fetch_array(MYSQLI_ASSOC);
		if( !$campID = $rs['campID'] ){
			$response = "couldn't find '$camp' in camp list";
			die(print json_encode($response));
		}
						// get registerID
		$query = "SELECT registerID FROM register WHERE campID = '$campID' and childID = '$childID' ";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
		$rs = $sql->fetch_array(MYSQLI_ASSOC);
		if( $registerID = $rs['registerID'] ){
						// delete register entry
			if ($drop){
				$query = "DELETE FROM register WHERE registerID = '$registerID' ";
				$sql = $db->query($query) or trigger_error($db->error."[$sql]");
				$result = "drop";
				$response = [2, $child, $camp, $parent_count, $type_camps, $type_items, $price, 0];
				die(print json_encode($response));
			}
						// error
			else {
				$response = "$child is already registered in $camp";
				die(print json_encode($response));
			}
		}
		if($drop){
			$response = "$child wasn't enrolled in that camp";
			die(print json_encode($response));
		}
		else{
					// otherwise, make new entry 
			$query = "INSERT INTO register (campID, childID, cvv, price, card) VALUES ('$campID', '$childID', '$cvv', '$price', '$card') ";
		}
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
		$response = [1, $child, $camp, $parent_count, $type_camps, $type_items, $price, 0];
		die(print json_encode($response));
	}

// for items

	if($type_items){
			// find the itemID
		$query = "SELECT itemID FROM items where item = '$item' ";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
		$rs = $sql->fetch_array(MYSQLI_ASSOC);
		if( !$itemID = $rs['itemID'] ){
			$response = "couldn't find $item in item list";
			die(print json_encode($response));
		}
			// look for paymentID for child -- item
		$query = "SELECT paymentID, count FROM payment WHERE itemID = '$itemID' and childID = '$childID' ";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
		$rs = $sql->fetch_array(MYSQLI_ASSOC);
		$count = $rs['count'];
				// if item has already been bought
		$paymentID = $rs['paymentID'] ;
		if( $count ){
				// delete entry if one left
			if ($drop){
				if( $count == 1){
					$count--;
					$query = "DELETE FROM payment WHERE paymentID = '$paymentID' ";
					$sql = $db->query($query) or trigger_error($db->error."[$sql]");
					$result = "drop";
					$response = [2, $child, $item, $parent_count, $type_camps, $type_items, $price, $count];
					die(print json_encode($response));
				}
					// or remove one of the items.
				else if($count > 1) {
					$count--;
					$query = "UPDATE payment SET count = '$count' where paymentID = '$paymentID' ";
					$sql = $db->query($query) or trigger_error($db->error."[$sql]");
					$response = [2, $child, $item, $parent_count, $type_camps, $type_items, $price, $count];
					die(print json_encode($response));
				} 
			}
					// buy again. 
			else {
				$count++;
				$query = "UPDATE payment SET count = '$count' where paymentID = '$paymentID' ";
				$sql = $db->query($query) or trigger_error($db->error."[$sql]");
				$response = [1, $child, $item, $parent_count, $type_camps, $type_items, $price, $count];
				die(print json_encode($response));
			}
		}
				// purchase a new item
		else {

			if ($drop) {
					$response = "$item was not in your list";
					die(print json_encode($response));
				}
			else{
							// otherwise, make new entry
				$query = "INSERT INTO payment (itemID, childID, cvv, price, card, count) VALUES ('$itemID', '$childID', '$cvv', '$price', '$card', 1) ";
				$sql = $db->query($query) or trigger_error($db->error."[$sql]");
				$count++;
				$response = [1, $child, $item, $parent_count, $type_camps, $type_items, $price, $count];
				die(print json_encode($response));
			}
		}

	}

	print json_encode('something went wrong');

	$db = null;

?>

