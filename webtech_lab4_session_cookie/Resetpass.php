<?php
    include "Validation.php";
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: Login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Reset Password </h1>
        <form method="post" action="ResetpassAction.php" novalidate>
            <label for="security">What is your pet's name : </label>
            <input type="text" name="security" id="security" value="">
            <br><br>
            <label for="pass">Password : </label>
            <input type="password" id="pass" name="password">
            <br><br>
            <label for="cpass">Confirm Password : </label>
            <input type="password" id="cpass" name="confirm_password">
            <br><br>
            <input type="submit" value="Reset">
        </form>
    </body>
</html>