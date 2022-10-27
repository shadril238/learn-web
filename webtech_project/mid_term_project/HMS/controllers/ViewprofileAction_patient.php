<?php
    session_start();
    if(!isset($_SESSION['email']) and !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
    // accessing patient index 
    $index=$_SESSION['patient_idx'];

    // json read
    $filename= "../models/patient_data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data);
    //accessing patient data
    $row=$data[$index]; 

    $_SESSION['fname']=$row->fname;
    $_SESSION['lname']=$row->lname;
    $_SESSION['phone']=$row->phone;
    $_SESSION['dob']=$row->dob;
    $_SESSION['gender']=$row->gender;
    $_SESSION['blood_group']=$row->blood_group;
    $_SESSION['address']=$row->address;
    $_SESSION['district']=$row->district;
    $_SESSION['division']=$row->division;
    $_SESSION['postal_code']=$row->postal_code;
    $_SESSION['photo']=$row->photo;


?>
