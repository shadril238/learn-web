<?php
    session_start();
    //include "Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="js/Resetpass.js"></script>
    <link rel="stylesheet" type="text/css" href="css/ResetpassStyle.css">
</head>
<body>
    <div class="main">
    <h3>Reset Password</h3>

    <form action="../controllers/ResetpassAction_patient.php" method="post" novalidate onsubmit="return isValid(this);">
        <div class="inp">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="">
        <br>
        <span id="email_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_email'])){
                echo $_SESSION['msg_email'];
                unset($_SESSION['msg_email']);
            }
        ?>
        <br>
        <label for="security_ques">Security Question</label>
        <select name="security_ques" id="security_ques">
            <option value="" >Select here </option>
            <option value="What is the last name of the teacher who gave you your first failing grade?" >What is the last name of the teacher who gave you your first failing grade?</option>
            <option value="What is your pets name?" >What is your pet's name?</option>
            <option value="In what year was your father born?" >In what year was your father born?</option>
        </select>
        <br>
        <span id="ques_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_securityQ'])){
                echo $_SESSION['msg_securityQ'];
                unset($_SESSION['msg_securityQ']);
            }
        ?>
        <br>

        <label for="security_ans">Security Answer</label> 
        <input type="text" name="security_ans" id="security_ans">
        <br>
        <span id="ans_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_securityA'])){
                echo $_SESSION['msg_securityA'];
                unset($_SESSION['msg_securityA']);
            }
        ?>
        <br>

        <label for="npass">New Password</label>
        <input type="password" id="npass" name="npassword">
        <br>
        <span id="pass_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_npass'])){
                echo $_SESSION['msg_npass'];
                unset($_SESSION['msg_npass']);
            }
        ?>
        <br>

        <label for="cpass">Confirm New Password </label>
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
        <button type="submit">Reset Password</button>
        </div>
    </form>
    <span id="global_msg" style="color:red"></span>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>

    </div>
</body>

</html>