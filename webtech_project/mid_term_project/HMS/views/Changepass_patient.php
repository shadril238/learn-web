<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form action="../controllers/ChangepassAction_patient.php" method="post" novalidate>
        <label for="pass">Current Password : </label>
        <input type="password" id="pass" name="password">
        <br>
        <?php
            if(isset($_SESSION['msg_pass'])){
                echo $_SESSION['msg_pass'];
                unset($_SESSION['msg_pass']);
            }
        ?>
        <br>

        <label for="npass">New Password : </label>
        <input type="password" id="npass" name="npassword">
        <br>
        <?php
            if(isset($_SESSION['msg_npass'])){
                echo $_SESSION['msg_npass'];
                unset($_SESSION['msg_npass']);
            }
        ?>
        <br>

        <label for="cpass">Confirm New Password : </label>
        <input type="password" id="cpass" name="cpassword">
        <br>
        <?php
            if(isset($_SESSION['msg_cpass'])){
                echo $_SESSION['msg_cpass'];
                unset($_SESSION['msg_cpass']);
            }
        ?>
        <br>
        <input type="submit" value="Change Password">
    </form>

    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>