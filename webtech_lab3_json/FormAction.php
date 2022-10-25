<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Action Page</title>
</head>
<body>

	<h1>Action Page</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$firstname = sanitize($_POST['fname']);
			$lastname = sanitize($_POST['lname']);
			if (empty($firstname) or empty($lastname)) {
				echo "Please fill up the form properly";
			}
			else {
				$filename = "data.json";
				$data = array("firstname" => $firstname, "lastname" => $lastname);
				$current_data=file_get_contents($filename);
				$array_data=json_decode($current_data,true);
				//var_dump($array_data);
				
				$array_data[]=$data;
				//var_dump($array_data);

				$final_data=json_encode($array_data);
				file_put_contents($filename,$final_data);
			}
		}

		function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

	<br><br>

	<a href="Form.php">Back</a> | <a href="Show_All.php">Show All</a>

</body>
</html>