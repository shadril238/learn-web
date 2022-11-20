<?php 
session_start();

if (!$_SESSION['email']) {
	header("Location: login_view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>

	<h1>Home</h1>

	<p>Welcome, <?php echo $_SESSION['email']; ?> </p>

	<br><br>

	<a href="../controllers/Logout.php">Logout</a>

</body>
</html>