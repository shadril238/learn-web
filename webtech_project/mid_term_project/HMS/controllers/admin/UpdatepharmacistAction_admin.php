<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['admin_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_admin.php");
    }
    include "../Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        
        $f_name=sanitize($_POST['fname']);
        $l_name=sanitize($_POST['lname']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $blood_group=sanitize($_POST['blood_group']);
        $eduqual=sanitize($_POST['eduqual']);
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

        
        //education
        if(empty($eduqual)){
            $isValid=false;
            $_SESSION['msg_eduqual']="Please fill up your educational qualification properly";
        } else{
            if(!isValidName($eduqual)){
                $isValid=false;
                $_SESSION['msg_eduqual']="Please enter your educational qualification properly";
            }
        } 

        if($isValid){
            $filename="../../models/pharmacist_data.json";
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
                $current_data=json_decode($current_data,true);
                //$data=array("email"=>$_SESSION['email'], "password"=>$_SESSION['password'], "fname"=>$f_name,"lname"=>$l_name,"phone"=>$phone_no, "dob"=>$dob,"gender"=>$gender,"blood_group"=>$blood_group,"eduqual"=>$eduqual,"photo"=>$_SESSION['photo'],"security_ques"=>$_SESSION['security_ques'], "security_ans"=>$_SESSION['security_ans']);

                $current_data[$_SESSION['idx']]['fname']=$f_name;
                $current_data[$_SESSION['idx']]['lname']=$l_name;
                $current_data[$_SESSION['idx']]['dob']=$dob;
                $current_data[$_SESSION['idx']]['gender']=$gender;
                $current_data[$_SESSION['idx']]['blood_group']=$blood_group;

                $current_data=json_encode($current_data);
                file_put_contents($filename,$current_data);

                unset($_SESSION['idx']);
                header("Location: ../../views/admin/Viewpharmacist_admin.php");
            }else{
                $_SESSION['global_msg']="Error in database. Please contact with admin.";
                header("Location: ../../views/admin/Updatepharmacist_admin.php");
            }
        }else{
            //not valid
            header("Location: ../../views/admin/Updatepharmacist_admin.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/admin/Updatepharmacist_admin.php");
    }
?>

