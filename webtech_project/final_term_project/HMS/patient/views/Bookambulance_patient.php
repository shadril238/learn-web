<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    include "Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ambulance</title>
    <script src="js/Bookambulance.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Bookambulance.css">

</head>
<body>
    <div class="main">
    
    <a href="Ambulancebookinghistory_patient.php"><button id="history">Ambulance Booking History</button></a>
    <br>
    <h3>Book Ambulance</h3>
    <br>
    <form action="../controllers/BookambulanceAction_patient.php" method="post" novalidate onsubmit="return isValid(this);">
        <label for="addr">Pickup Address </label>
        <textarea id="addr" name="address" cols="20" rows="1"></textarea>
        <br>
        <span id="addr_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_addr'])){
                echo $_SESSION['msg_addr'];
                unset($_SESSION['msg_addr']);
            }
        ?>
        <br>

        <label for="dis">District </label>
        <select name="district" id="dis">
            <option value="">Select here</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Faridpur">Faridpur</option>
            <option value="Gazipur">Gazipur</option>
            <option value="Gopalganj">Gopalganj</option>
            <option value="Jamalpur">Jamalpur</option>
        </select>
        <br>
        <span id="dis_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_dis'])){
                echo $_SESSION['msg_dis'];
                unset($_SESSION['msg_dis']);
            }
        ?>
        <br>

        <label for="div">Division </label>
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
        <span id="div_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_div'])){
                echo $_SESSION['msg_div'];
                unset($_SESSION['msg_div']);
            }
        ?>
        <br>

        <label for="pcode">Postal Code </label>
        <input type="text" id="pcode" name="postal_code">
        <br>
        <span id="pcode_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_postal'])){
                echo $_SESSION['msg_postal'];
                unset($_SESSION['msg_postal']);
            }
        ?>
        <br>

        <label for="date">Pickup Date </label>
        <input type="date" id="date" name="date">
        <br>
        <span id="date_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_date'])){
                echo $_SESSION['msg_date'];
                unset($_SESSION['msg_date']);

            }
        ?>
        <br>

        <label for="time">Pickup Time </label>
        <input type="time" name="time" id="time">
        <br>
        <span id="time_msg" style="color:red"></span>
        <?php
             if(isset($_SESSION['msg_time'])){
                echo $_SESSION['msg_time'];
                unset($_SESSION['msg_time']);
            } 
        ?>
        <br>

        <button type="submit">Book Ambulance</button>
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
    </div>
</body>
</html>