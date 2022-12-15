<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_patient.php");
    }
    require "../models/BookambulanceDB_patient.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Booking History</title>
    <link rel="stylesheet" type="text/css" href="css/Ambulancehistory.css">
</head>
<body>
    <div class="main">
    <h3>Ambulance Booking History</h3>
    <table class="his">
        <thead>
            <tr>
                <th>Index</th>
                <th>Pickup Location</th>
                <th>District</th>
                <th>Division</th>
                <th>Postal Code</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Booking Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result=history();
                if($result->num_rows>0){
                    $idx=1;
                    while($row=mysqli_fetch_assoc($result)){
                        echo"
                            <tr>
                                <td>".$idx++."</td>
                                <td>".$row['ploc']."</td>
                                <td>".$row['pdis']."</td>
                                <td>".$row['pdiv']."</td>
                                <td>".$row['ppostal']."</td>
                                <td>".$row['pdate']."</td>
                                <td>".$row['ptime']."</td>
                                <td>".$row['status']."</td>
                            </tr>
                            ";
                    }
                }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>