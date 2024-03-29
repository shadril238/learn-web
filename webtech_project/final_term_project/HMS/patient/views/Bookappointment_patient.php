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
    <title>Doctor's Appointment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/Searchdoc.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Appointment.css">
</head>
<body>
    <div class="main">
    <h3>Book Doctor's Appointment</h3>
    <div class="s">
    <input type="search" name="search" id="search" placeholder="Search..">
    </div>
    
    <div class="b">
    <a href="Appointmenthistory_patient.php"><button id="but">Appointment History</button></a>
    </div>
    <br>
    <br>
    <table class="doc">
        <thead>
            <tr>
                <th>Doctor Name</th>
                <th>Degree</th>
                <th>Speciality</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id='tdata'>
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
    </div>
</body>
<?php
    include "Footer.php";
?>
</html> 