<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, "second", 3306);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "Select id, username, password From User";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		echo $row["id"] . " " . $row["username"] . " " .$row["password"];
		echo "<br><br>";
	}
}
else {
	echo "No record(s) found";
}

mysqli_close($conn);
?>