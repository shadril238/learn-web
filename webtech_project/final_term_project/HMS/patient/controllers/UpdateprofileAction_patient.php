<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
    require "Validation.php";  
    require "../models/UpdateprofileDB_patient.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $f_name=sanitize($_POST['fname']);
        $l_name=sanitize($_POST['lname']);
        $phone_no=sanitize($_POST['phn']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $blood_group=sanitize($_POST['blood_group']);
        $address=sanitize($_POST['address']);
        $district=sanitize($_POST['district']);
        $division=sanitize($_POST['division']);
        $postal_code=sanitize($_POST['postal_code']);
        $isValid=true;

        //first name
        if(empty($f_name)){
            $isValid=false;
            $_SESSION['msg_fname']="Please fill up the first name properly!";
        } else {
            if(!isValidName($f_name)) {
                $isValid=false;
                $_SESSION['msg_fname']="First name is invalid!";
            }
        }
        //last name
        if(empty($l_name)){
            $isValid=false;
            $_SESSION['msg_lname']="Please fill up the last name properly!";
        } else {
            if(!isValidName($l_name)) {
                $isValid=false;
                $_SESSION['msg_fname']="Last name is invalid!";
            }
        }
        
        //phone
        if(empty($phone_no)){
            $isValid=false;
            $_SESSION['msg_phn']="Please fill up the phone no properly!";
        }else{
            if(!isValidPhone($phone_no)){
                $isValid=false;
                $_SESSION['msg_phn']="Please provide valid phone no!";
            }
        }

        //dob
        if(empty($dob)){
            $isValid=false;
            $_SESSION['msg_dob']="Please fill up the date-of-birth properly!";
        } //else
        //gender
        if(!isset($gender)){
            $isValid=false;
            $_SESSION['msg_gender']="Please fill up the gender properly!";
        } //else

        //blood group
        if($blood_group==""){
            $isValid=false;
            $_SESSION['msg_bg']="Please select the blood group properly!";
        } //else

        //address line
        if(empty($address)){
            $isValid=false;
            $_SESSION['msg_addr']="Please fill up the address line 1 properly!";
        }//else

        //district
        if($district===""){
            $isValid=false;
            $_SESSION['msg_dis']="Please select the district properly!";
        } //else
        //division
        if($division===""){
            $isValid=false;
            $_SESSION['msg_div']="Please select the division properly!";
        }//else

        //postal code
        if(empty($postal_code)){
            $isValid=false;
            $_SESSION['msg_postal']="Please fill up the postal code properly!";
        }else{
            if(!isValidPostalCode($postal_code)){
                $isValid=false;
                $_SESSION['msg_postal']="Please provide valid postal code!";
            }
        }

        if($isValid){
            if(updateProfile($f_name,$l_name,$phone_no,$dob,$gender,$blood_group,$address,$district,$division,$postal_code)){
                header("Location:ViewprofileAction_patient.php");
            }
            else{
                $_SESSION['global_msg']="Something went wrong in updating profile.";
                header("Location: ../views/Updateprofile_patient.php");
            }
        }else{
            //not valid
            header("Location: ../views/Updateprofile_patient.php");
        }


    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Updateprofile_patient.php");
    }
?>
