<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
    require "../models/BookappointmentDB_patient.php";
    //echo $_SESSION['index'];
    $index=$_GET['idx'];
    if(bookAppointment($index)){
        header("location:../views/Bookappointment_patient.php");
    }
    else{
        ///something went wrong msg...
    }
    
?>