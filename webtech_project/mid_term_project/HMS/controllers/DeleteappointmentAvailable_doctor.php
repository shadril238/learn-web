<?php 

    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_doctor.php");
    }


    $index=$_GET['idx'];
    $filename="../models/doctor_appointment_data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data);
    unset($data[$index]); 
    $data=array_values($data);
    file_put_contents($filename,json_encode($data));
    ///echo $index;
    header("location:../views/ViewappointmentAvailable_doctor.php");
?>