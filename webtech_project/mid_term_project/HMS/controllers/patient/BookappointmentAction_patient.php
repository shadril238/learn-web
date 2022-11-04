<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/patient/Login_patient.php");
    }
    //echo $_SESSION['index'];
    $index=$_GET['idx'];
    $filename="../../models/doctor_appointment_data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data,true);
    //updating data
    $data[$index]['pemail']=$_SESSION['email'];
    $data[$index]['pname']=$_SESSION['fname']." ".$_SESSION['lname'] ;
    $data[$index]['status']="Booked";
    $data=json_encode($data);
    file_put_contents($filename,$data);
    header("location:../../views/patient/Bookappointment_patient.php");
?>