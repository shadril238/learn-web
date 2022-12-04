<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script src="js/login.js"></script>
</head>
<body>

	<h1>Login</h1>

	<form method="post" action="../controllers/LoginController.php" novalidate onsubmit="return isValid(this);">
		Email: <input type="email" name="email">
		<?php echo isset($_SESSION['email_msg']) ? $_SESSION['email_msg'] : ""; ?>
		<span id="email_msg" style="color:red"></span>
		<br><br>
		Password: <input type="text" name="password">
		<?php echo isset($_SESSION['password_msg']) ? $_SESSION['password_msg'] : ""; ?>
		<span id="password_msg" style="color:red"></span>
		<br><br>
		<input type="submit">
	</form>

	<br>

	<?php echo isset($_SESSION['global_msg']) ? $_SESSION['global_msg'] : ""; ?>

</body>
</html>