<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacist Login</title>
</head>
<body>
    <h1>Pharmacist Login</h1>
    <form method="post" action="../../controllers/pharmacist/LoginAction_pharmacist.php" novalidate>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="">
        <br>
        <?php
            if(isset($_SESSION['msg_email'])){
                echo $_SESSION['msg_email'];
                unset($_SESSION['msg_email']);
            }
        ?>
        <br>

        <label for="password">Password : </label>
        <input type="password" name="password" id="password" value="">
        <br>
        <?php
            if(isset($_SESSION['msg_pass'])){
                echo $_SESSION['msg_pass'];
                unset($_SESSION['msg_pass']);
            }
        ?>
        <br>
        <input type="submit" value="Login">

        <p>New User? <a href="Signup_pharmacist.php">Signup here.</a></p>
        <p>Forgot Password? <a href="Forgotpass_pharmacist.php">Reset now.</a></p>
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>