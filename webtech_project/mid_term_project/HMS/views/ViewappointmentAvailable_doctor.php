<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_doctor.php");
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
    <title>Show All Appointments</title>
</head>
<body>
    <h1>Show All Appointments</h1>
    <?php
        $filename="../models/doctor_appointment_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
            <tr>
                <th>Index</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                    $sn=0;
                    $index=0;
                    foreach($data as $read_data){
                        $demail=$read_data->demail;
                        $date=$read_data->adate;
                        $time=$read_data->atime;
                        $status=$read_data->status;
                        if($demail===$_SESSION['email'] and $status==="Available"){
                            $sn++;
                            echo"
                                <tr>
                                    <td>".$sn."</td>
                                    <td>".$date."</td>
                                    <td>".$time."</td>
                                    <td>".$status."</td>
                                    <td>
                                        <a href='../views/Updateappointment_doctor.php?idx=".$index."'>Update</a>
                                        <a href='../controllers/DeleteappointmentAvailable_doctor.php?idx=".$index."'>Delete</a>
                                    </td>
                                </tr>
                                ";
                        }
                        $index++;
                    }
                ?>
            </tr>
        </tbody>
    </table>

</body>
</html>