<?php
    include "Header_patient.php";
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_patient.php");
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
    <title>Ambulance Booking History</title>
</head>
<body>
    <h1>Ambulance Booking History</h1>
    <?php
        $filename="../../models/ambulance_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
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
            <?php
                $idx=1;
                foreach($data as $read_data){
                    $email=$read_data->user_email;
                    if($_SESSION['email']===$email){
                        echo "
                            <tr>
                                <td>".$idx++."</td>
                                <td>".$read_data->pickup_location."</td>
                                <td>".$read_data->pickup_district."</td>
                                <td>".$read_data->pickup_division."</td>
                                <td>".$read_data->pickup_postal_code."</td>
                                <td>".$read_data->pickup_date."</td>
                                <td>".$read_data->pickup_time."</td>
                                <td>".$read_data->status."</td>
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