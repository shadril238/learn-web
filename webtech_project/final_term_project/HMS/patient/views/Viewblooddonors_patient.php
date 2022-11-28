<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    require "../models/ViewblooddonorsDB_patient.php";
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
                if($result->num_rows>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>".$row['d_name']."</td>
                                <td>".$row['d_bg']."</td>
                                <td>".$row['d_name']."</td>
                                <td>".$row['d_gen']."</td>
                                <td>".$row['d_loc']."</td>
                                <td>".$row['d_phn']."</td>
                            </tr>
                            ";
                    }
                }
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>