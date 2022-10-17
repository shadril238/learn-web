<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>   
<form method="post" action="loginAction.php" novalidate>
  <h3>Login Page</h3>
  <label for="email">Email:</label>
  <br>
  <input type="email" id="email" name="email">
  <br>
  <label for="pass">Password:</label>
  <br>
  <input type="password" id="pass" name="pass">
  <br>
  <br>
  <button>Submit</button>
</form> 

<?php 
		if (isset($_GET['msg'])) {
			echo $_GET['msg'];
		}
?>

</body>
</html>
