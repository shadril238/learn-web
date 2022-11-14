<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body>
    <a href="index.php">Home</a> <a href="setConversionrate.php">Conversion Rate</a> <a href="history.php">History</a>

    <h1>History</h1>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        $conn = mysqli_connect($servername, $username, $password, "webtech", 3306);
        
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "Select id, cat, rate, val, res From convertion";
        $res = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
                echo $row["id"] . " " . $row["cat"] . " " .$row["rate"]. " " . $row["val"] . " " .$row["res"];
                echo "<br><br>";
            }
        }
        else {
            echo "No record(s) found";
        }
        
        mysqli_close($conn);

    ?>
</body>
</html>