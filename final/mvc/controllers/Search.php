<?php 
	
	require '../models/User.php';

	if ($_SERVER["REQUEST_METHOD"] === "GET") {

		$key = sanitize($_GET['email']);
		$res = search($key);
		
		$arr1 = array();
		while($row = mysqli_fetch_assoc($res)) {
			array_push($arr1, array("email" => $row['email'], "password" => $row['password']));
		}
	
		echo json_encode($arr1);
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>