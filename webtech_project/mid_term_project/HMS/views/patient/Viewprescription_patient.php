<?php
    session_start();
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
    <title>View Prescription</title>
</head>
<body>
    <h1>View Prescription</h1>
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
                <th>Degree</th>
                <th>Department</th>
                <th>Prescription Date</th>
                <th>Prescription</th>
                
            </tr>
            <?php
                $idx=1;
                foreach($data as $read_data){
                    $pemail=$read_data->pemail;
                    $status=$read_data->status;
                    if($pemail===$_SESSION['email'] and $status==="Completed"){
                        $dname=$read_data->dname;
                        $demail=$read_data->demail;
                        $pres=$read_data->prescribe;
                        $degree=$read_data->degree;
                        $department=$read_data->department;
                        $date=$read_data->adate;

                        echo"
                            <tr>
                                <td>".$idx++."</td>
                                <td>".$dname."</td>
                                <td>".$demail."</td>
                                <td>".$degree."</td>
                                <td>".$department."</td>
                                <td>".$date."</td>
                                <td>".$pres."</td>
                            </tr>
                        
                            ";
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>