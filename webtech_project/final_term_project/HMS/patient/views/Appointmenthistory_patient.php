<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    include "Header.php";
    require "../models/BookappointmentDB_patient.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment History</title>
    <link rel="stylesheet" type="text/css" href="css/Appointmenthistory.css">
</head>
<body>
    <div class="main">
    <h3>Appointment History</h3>
    
    <table class="doc">
        <thead>
            <tr>
                <th>Index</th>
                <th>Doctor Name</th>
                <th>Doctor Email</th>
                <th>Doctor Degree</th>
                <th>Doctor Department</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>
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
                                <td>".$row['d_name']."</td>
                                <td>".$row['d_email']."</td>
                                <td>".$row['d_degree']."</td>
                                <td>".$row['d_dept']."</td>
                                <td>".$row['adate']."</td>
                                <td>".$row['atime']."</td>
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
<?php
    include "Footer.php";
?>
</html>