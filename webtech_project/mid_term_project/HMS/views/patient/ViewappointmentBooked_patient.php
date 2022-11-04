<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_doctor.php");
    }
    ////////need to do code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment History</title>
</head>
<body>
    
</body>
</html>