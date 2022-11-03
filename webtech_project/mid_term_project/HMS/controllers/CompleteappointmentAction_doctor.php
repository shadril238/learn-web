<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_doctor.php");
    }
    $index=$_SESSION['index'];
    $filename="../models/doctor_appointment_data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data,true);

    $data[$index]['status']="Completed";
    $data=json_encode($data);
    file_put_contents($filename,$data);
    header("Location:../views/ViewappointmentBooked_doctor.php");
?>