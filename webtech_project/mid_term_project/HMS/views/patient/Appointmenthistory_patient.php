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
    <title>Doctor Appointment History</title>
</head>
<body>
    <h1>Appointment History</h1>
    <?php
        $filename="../../models/doctor_appointment_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
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

            <?php
                $index=1;
                foreach($data as $read_data){
                    $dname=$read_data->dname;
                    $demail=$read_data->demail;
                    $degree=$read_data->degree;
                    $dept=$read_data->department;
                    $date=$read_data->adate;
                    $time=$read_data->atime;
                    $pemail=$read_data->pemail;
                    $status=$read_data->status;

                    if($pemail===$_SESSION['email'] and $status!="Available"){
                        echo"
                            <tr>
                                <td>".$index++."</td>
                                <td>".$dname."</td>
                                <td>".$demail."</td>
                                <td>".$degree."</td>
                                <td>".$dept."</td>
                                <td>".$date."</td>
                                <td>".$time."</td>
                                <td>".$status."</td>
                            </tr>
                            ";
                    }

                }
            ?>
        </tbody>
    </table>\
    <?php
        include "Footer_patient.php";
    ?>
</body>
</html>