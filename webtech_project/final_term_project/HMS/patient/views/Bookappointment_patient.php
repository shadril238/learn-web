<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    require "../models/BookappointmentDB_patient.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Table Border Style-->
    <style> 
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointment</title>
</head>
<body>
    <h1>Book Doctor's Appointment</h1>
    <a href="Appointmenthistory_patient.php">Appointment History</a>
    <br>
    <table>
        <tbody>
            <tr>
                <th>Doctor Name</th>
                <th>Degree</th>
                <th>Speciality</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $result=appointmentData();
                if($result->num_rows>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $idx= $row['d_id'];
                        echo"
                            <tr>
                                <td>".$row['d_name']."</td>
                                <td>".$row['d_degree']."</td>
                                <td>".$row['d_dept']."</td>
                                <td>".$row['adate']."</td>
                                <td>".$row['atime']."</td>
                                <td>".$row['status']."</td>
                                <td>
                                    <a href='../controllers/BookappointmentAction_patient.php?idx=".$idx."'>Book</a>
                                </td>
                            </tr>
                            ";
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html> 