<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>   
<form method="post" action="profileAction.php" novalidate>
  <h3>Profile</h3>
  <label for="fname">First Name:</label>
  <br>
  <input type="text" id="fname" name="fname">
  <br>
  <label for="lname">Last Name:</label>
  <br>
  <input type="text" id="lname" name="lname">
  <br>
  <label for="picture">Profile Picture:</label>
  
  <input type="file" id="picture" name="picture">
  <br>
  <label for="addr">Address Line 1:</label>
  <br>
  <textarea id="addr" name="addr" cols="20" rows="1"></textarea>
  <br>
  <label for="dis">District:</label>
  <select name="district" id="dis">
    <option value="Tangail">Tangail</option>
    <option value="Kustia">Kustia</option>
  </select>
  <br>
  <label for="div">Division:</label>
  <select name="division" id="div">
    <option value="Dhaka">Dhaka</option>
    <option value="Mymensingh">Mymensingh</option>
    <option value="Sylhet">Sylhet</option>
  </select>
  <br>
  <label for="pcode">Post Code:</label>
  <br>
  <input type="number" id="pcode" name="pcode">
  <br>
  <br>
  <label for="con">Country:</label>
  <select name="country" id="con">
    <option value="Bangladesh">Bangladesh</option>
    <option value="India">India</option>
    <option value="Pakistan">Pakistan</option>
  </select>

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
