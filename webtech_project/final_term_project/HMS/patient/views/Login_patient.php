<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" type="text/css" href="css/LoginStyle.css">
    <script src="js/Login.js"></script>
</head>
<body>
    <div class="main">
        <div class="logo">
            <img src="../models/hms_logo.png" alt="HMS Logo">
        </div>
        <h3>Patient Login</h3>
        <form method="post" action="../controllers/LoginAction_patient.php" novalidate onsubmit="return isValid(this);">
            <div class="inp">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email Address">
                <br>
                <span id="email_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_email'])){
                        echo $_SESSION['msg_email'];
                        unset($_SESSION['msg_email']);
                    }
                ?>
                <br>

                <label for="password">Password </label>
                <input type="password" name="password" id="password" placeholder="Password">
                <br>
                <span id="password_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_pass'])){
                        echo $_SESSION['msg_pass'];
                        unset($_SESSION['msg_pass']);
                    }
                ?>
                <br>
                <button type="submit">Log In</button>
            </div>
            <br>
        </form>
        <br>
        <div class="global_msg">
        <?php
            if(isset($_SESSION['global_msg'])){
                echo $_SESSION['global_msg'];
                unset($_SESSION['global_msg']);
            }
        ?>
        </div>
        <div class="link">
            <p>New User? <a href="Signup_patient.php">Signup here.</a></p>
            <p>Forgot Password? <a href="Resetpass_patient.php">Reset now.</a></p>
        </div>
    </div> 
</body>
<?php
    include "Footer.php";
?>
</html>