<?php

	if (isset($_POST['submit-create'])){
		
		if($_POST['child'] == "")
			die(print json_encode("enter child's name"));
		if($_POST['phone'] == "")
			if($_POST['email'] == "")
				die(print json_encode("enter email address or phone number"));
		if($_POST['parent'] == "")
			die(print json_encode("enter parent's name"));
		if($_POST['age'] == "")
			die(print json_encode("enter child's age"));
		if($_POST['grade'] == "")
			die(print json_encode("enter child's grade"));

		$parent = $_POST['parent'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$child = $_POST['child'];
		$age = $_POST['age'];
		$grade = $_POST['grade'];
	}
	else{
		print_r($_POST);
		die('something');
	}

	include 'connect.php';

			$query = "SELECT childID as matches FROM children where child = '$child' ";
			$sql = $db->query($query) or trigger_error($db->error."[$sql]");
			$rs = $sql->fetch_array(MYSQLI_ASSOC);

			$result = 0;


			if ( !$rs ){
				$query = "INSERT INTO children (child, age, grade, phone, email, parent) 
						VALUES ('$child', '$age', '$grade', '$phone', '$email', '$parent')";
						$sql = $db->query($query) or trigger_error($db->error."[$sql]");
						$result = 1;
			}
	$response = [$result, $child, $email, $phone];
	print json_encode($response);
	
	$db = null;

?>
