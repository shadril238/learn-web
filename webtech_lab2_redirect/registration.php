<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>   
<form method="post" action="regAction.php" novalidate>
  <h3>Registration Page</h3>
  <label for="fname">First Name:</label>
  <br>
  <input type="text" id="fname" name="fname">
  <br>
  <label for="lname">Last Name:</label>
  <br>
  <input type="text" id="lname" name="lname">
  <br>
  <label for="gender">Gender:</label>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label>
  <br>
  <label for="email">Email:</label>
  <br>
  <input type="email" id="email" name="email">
  <br>
  <label for="pass">Password:</label>
  <br>
  <input type="password" id="pass" name="pass">
  <br>
  <label for="cpass">Confirm Password:</label>
  <br>
  <input type="password" id="cpass" name="cpass">
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