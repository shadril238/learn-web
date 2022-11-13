<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, "second", 3306);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "Update User Set password = '444' 
where id = 4";
$res = mysqli_query($conn, $sql);

if ($res) {
	echo "Record updated successfully";
}
else {
	echo "Error occurred " . $sql . " " . mysqli_error($conn);
}

mysqli_close($conn);
?>