<?php 
    include "Header_doctor.php";
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_doctor.php");
    }
    if(isset($_GET['idx'])){
        $_SESSION['idx']=$_GET['idx'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
</head>
<body>
    <h1>Add Prescription</h1>
    <form action="../../controllers/doctor/PrescribeAction_doctor.php" method="POST" novalidate>
        <label for="pres">Prescription : </label>
        <textarea id="pres" name="pres" cols="70" rows="30"></textarea>
        <br>
        <?php
            if(isset($_SESSION['msg_pres'])){
                echo $_SESSION['msg_pres'];
                unset($_SESSION['msg_pres']);
            }
        ?>
        <br>
        <input type="submit" value="Prescribe">
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>