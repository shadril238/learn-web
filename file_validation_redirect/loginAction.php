<?php 		
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		if (empty($_POST['email']) || empty($_POST['pass'])) {
			header("Location: login.php?msg=Please fill up the form properly");
		}
		else {
			echo $_POST['email'] . "<br>" . $_POST['pass'];
		}	
	}
	else {
		/*echo "Invalid Request";*/
		header("Location: error.html");
	}
?>