<?php 	
		
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$isValid = true;
		$msg = "";
		
		if (empty($_POST['email'])) {
			$isValid = false;
			$msg = "Please fill up the email properly ";
		}
		else {
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$msg .= "Please provide correct email ";
				$isValid = false;
			}
		}
		if (empty($_POST['password'])) {
			$isValid = false;
			$msg .= "Please fill up the password properly ";
		}
		if ($isValid) {
			echo sanitize($_POST['email']) . " " . sanitize($_POST['password']);
		}	
		else {
			header("Location: Login.php?msg=" . $msg . "&email=" . $_POST['email']);

			echo $msg;
		}
	}
	else {

		header("Location: error.html");
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>