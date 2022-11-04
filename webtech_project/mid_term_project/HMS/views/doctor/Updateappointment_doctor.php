<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_doctor.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
</head>
<body>
    <h1>Update Appointment</h1>
    <?php
        $index=$_GET['idx'];
        $_SESSION['idx']=$index;
        $filename="../../models/doctor_appointment_data.json";
        $data=file_get_contents($filename);
        $data= json_decode($data,true);
    ?>
    <form action="../../controllers/doctor/UpdateappointmentAction_doctor.php" method="post" novalidate>
    <label for="date">Appointment Date : </label>
    
        <input type="date" id="date" name="date" value="<?php echo $data[$index]['adate'] ?>">
        <br>
        <?php
            if(isset($_SESSION['msg_date'])){
                echo $_SESSION['msg_date'];
                unset($_SESSION['msg_date']);

            }
        ?>
        <br>

        <label for="time">Appointment Time : </label>
        <input type="time" name="time" id="time" value="<?php echo $data[$index]['atime']?>">
        <br>
        <?php
             if(isset($_SESSION['msg_time'])){
                echo $_SESSION['msg_time'];
                unset($_SESSION['msg_time']);
            } 
        ?>
        <br>
        <input type="submit" value="Update Appointment">
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>