<?php

	if (isset($_POST['submit-login'])){

		if($_POST['child'] == "")
			die(print json_encode("enter child's name"));
		if($_POST['phone'] == "")
			if($_POST['email'] == "")
				die(print json_encode("enter email address or phone number"));
		
		$child = $_POST['child'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$type_camps = 0;
		$type_items = 0;
		$display = 0;
		if(isset($_POST['type-camps'])){
			$type_camps = 1;
		}
		if(isset($_POST['type-items'])){
			$type_items = 1;
		}
		if(isset($_POST['display'])){
			$display = 1;
		}

	}
	else{
		die(print json_encode('info'));
	}
	
	include 'connect.php';

	$parent_count = 0;
	$camp_count = 0;
	$result = 0;
		// get childID
	$query = "SELECT childID FROM children WHERE child = '$child' AND (email = '$email' OR phone = '$phone')";
	$sql = $db->query($query) or trigger_error($db->error."[$sql]");
	$rs = $sql->fetch_array(MYSQLI_ASSOC);
	if( !$childID = $rs['childID'] ){
		$response = "couldn't find that account";
		die(print json_encode($response));
	}
		// count parent->children
	$query = "SELECT COUNT(childID) AS count FROM register WHERE childID IN
				(SELECT childID FROM children WHERE parent IN 
				(SELECT parent from children where childID = '$childID') )";
	$sql = $db->query($query) or trigger_error($db->error."[$sql]");
	$rs = $sql->fetch_array(MYSQLI_ASSOC);
	$parent_count = $rs['count'];
		// count registers if camps
	if ($type_camps or $display){
		$query = "SELECT COUNT(*) as cnt FROM register WHERE childID = '$childID' ";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
		$rs = $sql->fetch_array(MYSQLI_ASSOC);
		$camp_count = $rs['cnt'];
	}
		// used in javascript componenet
	$response[] = 1;
	$response [] = $child;
	$response [] = $parent_count;
	$response [] = $type_camps;
	$response [] = $type_items;
	$response [] = $camp_count;
	$response [] = $display;	

		// if camps
	if($type_camps or $display){
					// already guaranteed one entry.
		$query = "SELECT camp FROM camps WHERE campID IN 
					(select campID from register WHERE childID = '$childID')";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
			while($rs = $sql->fetch_array(MYSQLI_ASSOC)){ 
				$response[] = $rs['camp'];
			} 

	}

		// if items
	if($type_items or $display){
					// select item and count 
		$query = "SELECT distinct item, count FROM payment, items WHERE childID = '$childID' AND payment.itemID = items.itemID";
		$sql = $db->query($query) or trigger_error($db->error."[$sql]");
			while($rs = $sql->fetch_array(MYSQLI_ASSOC)){ 
				$response[] = $rs['item'];
				$response[] = $rs['count'];

			} 
	}

	$db = null;


	
	print json_encode($response);
?>

