<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>

    <form action="../controllers/ForgotpassAction_patient.php" method="post">
    <label for="email">Enter your email : </label>
        <input type="email" name="email" id="email" value="">
        <br>
        <?php
            if(isset($_SESSION['msg_email'])){
                echo $_SESSION['msg_email'];
                unset($_SESSION['msg_email']);
            }
        ?>
        <br>

        <label for="security_ques">Security Question : </label>
        <label for="security_ques"><?php echo $_SESSION['security_ques']?></label>
        <input type="text" id="security_ques" name="security_ques">
        <br><br>
        <label for="security_ans">Answer : </label> 
        <input type="text" name="security_ans" id="security_ans">
        <br>
        <?php
            if(isset($_SESSION['msg_securityA'])){
                echo $_SESSION['msg_securityA'];
                unset($_SESSION['msg_securityA']);
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
        <input type="submit" value="Reset Password">

    </form>
</body>
</html>