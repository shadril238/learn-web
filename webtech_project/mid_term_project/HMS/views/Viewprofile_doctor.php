<?php
    session_start();
    if(!isset($_SESSION['email']) and !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_doctor.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Doctor Profile</title>
</head>
<body>
    <h1>View Doctor Profile</h1>
</body>
</html>