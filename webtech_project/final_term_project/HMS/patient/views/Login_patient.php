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
</head>
<body>
    <h1>Patient Login</h1>
    <div class="main">
        <form method="post" action="../controllers/LoginAction_patient.php" novalidate>
            <div class="inp">
                <label for="email">Email </label>
                <input type="email" name="email" id="email" placeholder="Enter your email">

                <br>
                <?php
                    if(isset($_SESSION['msg_email'])){
                        echo $_SESSION['msg_email'];
                        unset($_SESSION['msg_email']);
                    }
                ?>
                <br>

                <label for="password">Password </label>
                <input type="password" name="password" id="password" placeholder="Enter your password">

                <br>
                <?php
                    if(isset($_SESSION['msg_pass'])){
                        echo $_SESSION['msg_pass'];
                        unset($_SESSION['msg_pass']);
                    }
                ?>
                <br>
                <button type="submit">Log In</button>
            </div>
        </form>

        <div class="link">
            <p>New User? <a href="Signup_patient.php">Signup here.</a></p>
            <p>Forgot Password? <a href="Resetpass_patient.php">Reset now.</a></p>
        </div>
        <?php
            if(isset($_SESSION['global_msg'])){
                echo $_SESSION['global_msg'];
                unset($_SESSION['global_msg']);
            }
        ?>
    </div> 
</body>
</html>