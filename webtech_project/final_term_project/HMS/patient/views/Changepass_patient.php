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
    <title>Change Password</title>
    <script src="js/Changepass.js"></script>
    <link rel="stylesheet" type="text/css" href="css/ChangepassStyle.css">
</head>
<body>
    <div class="main">
    <h3>Change Password</h3>
    <form action="../controllers/ChangepassAction_patient.php" method="post" novalidate onsubmit="return isValid(this);">
        <div class="inp"> 
        <label for="pass">Current Password</label>
        <input type="password" id="pass" name="password">
        <br>
        <span id="pass_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_pass'])){
                echo $_SESSION['msg_pass'];
                unset($_SESSION['msg_pass']);
            }
        ?>
        <br>

        <label for="npass">New Password</label>
        <input type="password" id="npass" name="npassword">
        <br>
        <span id="npass_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_npass'])){
                echo $_SESSION['msg_npass'];
                unset($_SESSION['msg_npass']);
            }
        ?>
        <br>

        <label for="cpass">Confirm New Password</label>
        <input type="password" id="cpass" name="cpassword">
        <br>
        <span id="cpass_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_cpass'])){
                echo $_SESSION['msg_cpass'];
                unset($_SESSION['msg_cpass']);
            }
        ?>
        <br>
        <button type="submit">Change Password</button>
    </div>
    </form>
    <span id="global_msg" style="color:red"></span>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
    <div>
</body>
</html>