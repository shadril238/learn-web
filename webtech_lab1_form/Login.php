<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>

	<form method="post" action="LoginAction.php" novalidate>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email">

		<br><br>
		<?php 

		
	?>
		
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br><br>
		<input type="submit" value="Login">
	</form>


	<?php 

		if (isset($_GET['msg_email'])) {
			echo $_GET['msg_email'];
		}
	?>

</body>
</html>