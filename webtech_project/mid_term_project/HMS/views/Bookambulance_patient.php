<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ambulance</title>
</head>
<body>
    <h1>Book Ambulance</h1>
    <form action="../controllers/BookambulanceAction_patient.php" method="post" novalidate>
        <label for="addr">Pickup Address : </label>
        <textarea id="addr" name="address" cols="20" rows="1"></textarea>
        <br>
        <?php
            if(isset($_SESSION['msg_addr'])){
                echo $_SESSION['msg_addr'];
                unset($_SESSION['msg_addr']);
            }
        ?>
        <br>

        <label for="dis">District : </label>
        <select name="district" id="dis">
            <option value="">Select here</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Faridpur">Faridpur</option>
            <option value="Gazipur">Gazipur</option>
            <option value="Gopalganj">Gopalganj</option>
            <option value="Jamalpur">Jamalpur</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_dis'])){
                echo $_SESSION['msg_dis'];
                unset($_SESSION['msg_dis']);
            }
        ?>
        <br>

        <label for="div">Division : </label>
        <select name="division" id="div">
            <option value="">Select here</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Barishal">Barishal</option>
            <option value="Chattogram">Chattogram</option>
            <option value="Khulna">Khulna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Sylhet">Sylhet</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_div'])){
                echo $_SESSION['msg_div'];
                unset($_SESSION['msg_div']);
            }
        ?>
        <br>

        <label for="pcode">Postal Code : </label>
        <input type="text" id="pcode" name="postal_code">
        <br>
        <?php
            if(isset($_SESSION['msg_postal'])){
                echo $_SESSION['msg_postal'];
                unset($_SESSION['msg_postal']);
            }
        ?>
        <br>

        <label for="date">Pickup Date : </label>
        <input type="date" id="date" name="date">
        <br>
        <?php
            if(isset($_SESSION['msg_date'])){
                echo $_SESSION['msg_date'];
                unset($_SESSION['msg_date']);

            }
        ?>
        <br>

        <label for="time">Pickup Time : </label>
        <input type="time" name="time" id="time">
        <br>
        <?php
             if(isset($_SESSION['msg_time'])){
                echo $_SESSION['msg_time'];
                unset($_SESSION['msg_time']);
            } 
        ?>
        <br>

        <input type="submit" value="Book Ambulance">
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>