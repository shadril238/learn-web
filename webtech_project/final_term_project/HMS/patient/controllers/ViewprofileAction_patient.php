<?php
    session_start();
    require "../models/viewProfileDB_patient.php";

    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }

    $_SESSION['fname']=$p_fname;
    $_SESSION['lname']=$p_lname;
    //$_SESSION['password']=$p_pass;
    $_SESSION['phone']=$p_phn;
    $_SESSION['dob']=$p_dob;
    $_SESSION['gender']=$p_gender;
    $_SESSION['blood_group']=$p_bloodgroup;
    $_SESSION['address']=$p_address;
    $_SESSION['district']=$p_district;
    $_SESSION['division']=$p_division;
    $_SESSION['postal_code']=$p_postal;
    $_SESSION['photo']=$p_photo;
    
    $_SESSION['security_ques']=($p_sq===NULL)?"":$p_sq;
    $_SESSION['security_ans']=($p_sa===NULL)?"":$p_sa;
    
    header("Location: ../views/Viewprofile_patient.php");
?>
