<?php
    include "Header_patient.php";
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
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
    <title>Book Doctor's Appointment</title>
</head>
<body>
    <h1>Book Doctor's Appointment</h1>
    <a href="Appointmenthistory_patient.php">Appointment History</a>
    <br>
    <?php
        $filename="../../models/doctor_appointment_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
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
                $index=0;
                foreach($data as $read_data){
                    $demail=$read_data->demail;
                    $dname=$read_data->dname;
                    $degree=$read_data->degree;
                    $department=$read_data->department;
                    $date=$read_data->adate;
                    $time=$read_data->atime;
                    $pname=$read_data->pname;
                    $pemail=$read_data->pemail;
                    $status=$read_data->status;

                    if($pemail=="" and $pname==="" and $status==="Available"){
                        
                        echo"
                            <tr>
                                <td>".$dname."</td>
                                <td>".$degree."</td>
                                <td>".$department."</td>
                                <td>".$date."</td>
                                <td>".$time."</td>
                                <td>".$status."</td>
                                <td>
                                    <a href='../../controllers/patient/BookappointmentAction_patient.php?idx=".$index."'>Book</a>
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
        include "Footer_patient.php";
    ?>
</body>
</html>