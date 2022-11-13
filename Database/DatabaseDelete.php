<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, "second", 3306);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "Delete from User where id = 4";

$res = mysqli_query($conn, $sql);

if ($res) {
	echo "Record deleted successfully";
}
else {
	echo "Error occurred " . $sql . " " . mysqli_error($conn);
}

mysqli_close($conn);
?>