<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    include "Header.php";
    require "../models/ViewblooddonorsDB_patient.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donors List</title>
    <script src="js/Blooddonors.js"></script>
    <link rel="stylesheet" type="text/css" href="css/BlooddonorsStyle.css">
</head>
<body>
        
    <div class="main">
    <h3>Blood Donors List</h3>
    <form action="../controllers/Searchdonors.php" method="GET" onsubmit="return search(this);">
    <div class="inp">
        <input type="search" name="name">
        <button type="submit">Search</button>
    </div> 
    </form>
    <br>
    <div id='table'>
    <table class="btable">
        <thead>
            <tr>
                <th>Donor's Name</th>
                <th>Blood Group</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Location</th>
                <th>Contract No</th>
            </tr>
        </thead>
        <tbody id="tabledata">
            <?php
                //$key="Sa";
                $result=blooddonors();
                if($result->num_rows>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>".$row['d_name']."</td>
                                <td>".$row['d_bg']."</td>
                                <td>".$row['d_gen']."</td>
                                <td>".$row['d_age']."</td>
                                <td>".$row['d_loc']."</td>
                                <td>".$row['d_phn']."</td>
                            </tr>
                            ";
                    }
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>