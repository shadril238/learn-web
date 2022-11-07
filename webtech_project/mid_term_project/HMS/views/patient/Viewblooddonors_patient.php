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
    <title>Blood Donors List</title>
</head>
<body>
    <h1>Blood Donors List</h1>
    <?php
        $filename="../../models/blood_donors_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
            <tr>
                <th>Donor's Name</th>
                <th>Blood Group</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Location</th>
                <th>Contract No</th>
            </tr>
            <?php
                foreach($data as $read_data){
                    $blood_group=$read_data->blood_group;
                    if($_SESSION['blood_group']===$blood_group){
                        echo "
                            <tr>
                                <td>".$read_data->name."</td>
                                <td>".$read_data->blood_group."</td>
                                <td>".$read_data->age."</td>
                                <td>".$read_data->gender."</td>
                                <td>".$read_data->location."</td>
                                <td>".$read_data->phn_no."</td>
                            </tr>
                            ";
                    }
                }
            ?>
        </tbody>
    </table>
    <?php
        include "Footer_patient.php";
    ?>
</body>
</html>