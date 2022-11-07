<?php 
    include "Header_doctor.php";
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_doctor.php");
    }
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
    <title>View Booked Appointment List</title>
</head>
<body>
    <h1>View Booked Appointment List</h1>
    <?php
        $filename="../../models/doctor_appointment_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
            <tr>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $index=0;
                foreach($data as $read_data){
                    $demail=$read_data->demail;
                    $date=$read_data->adate;
                    $time=$read_data->atime;
                    $pname=$read_data->pname;
                    $pemail=$read_data->pemail;
                    $status=$read_data->status;

                    if($demail===$_SESSION['email'] and $status==="Booked"){
                        ///$_SESSION['index']=$index;
                        echo"
                            <tr>
                                <td>".$pname."</td>
                                <td>".$pemail."</td>
                                <td>".$date."</td>
                                <td>".$time."</td>
                                <td>".$status."</td>
                                <td>
                                    <a href='../../views/doctor/Prescribe_doctor.php?idx=".$index."'>Prescribe</a>
                                </td>
                            </tr>
                            ";
                    }
                    $index++;
                }
            ?>
        </tbody>
    </table>
    <?php
        include "Footer_doctor.php";
    ?>
</body>
</html>