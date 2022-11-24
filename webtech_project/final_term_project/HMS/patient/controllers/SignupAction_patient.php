<?php
    session_start();
    require "Validation.php";
    require "../models/SignupDB_patient.php";
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $f_name=sanitize($_POST['fname']);
        $l_name=sanitize($_POST['lname']);
        $email=sanitize($_POST['email']);
        $phone_no=sanitize($_POST['phn']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $blood_group=sanitize($_POST['blood_group']);
        $address=sanitize($_POST['address']);
        $district=sanitize($_POST['district']);
        $division=sanitize($_POST['division']);
        $postal_code=sanitize($_POST['postal_code']);
        $password=sanitize($_POST['password']);
        $c_password=sanitize($_POST['confirm_password']);
        $photo = $_FILES['photo'];
        
        ///var_dump($_FILES);
        $isValid=true;

        //photo (files)
        if($photo['size']<=0){
            $isValid=false;
            $_SESSION['msg_photo']="Please upload image properly!";
        }else{
            $formats=array("image/png","image/jpg");
            if(!in_array($photo['type'],$formats)){
                $isValid=false;
                $_SESSION['msg_photo']="Please upload your image in right format!";
            }
        }

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
        //email
        if(empty($email)) {
			$isValid=false;
            $_SESSION['msg_email']="Please fill up the email properly!";
		} else{
            if(!isValidEmail($email)){
                $isValid=false;
                $_SESSION['msg_email']="Please provide valid email address!";
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
        //password
        if(empty($password)){
            $isValid=false;
            $_SESSION['msg_pass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $_SESSION['msg_pass']="Please provide valid password!";
            }
        }	
        //confirm password
        if(empty($c_password)){
            $isValid=false;
            $_SESSION['msg_cpass']="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($c_password)){
                $isValid=false;
                $_SESSION['msg_cpass']="Please provide valid confirm password!";
            }
            else if($password!=$c_password){
                $isValid=false;
                $_SESSION['msg_cpass']="Password and confirm password not matched!";
            }
        }	
        //valid or not 
        if($isValid){
            //checking if the mail unique
            if(!isUniqueEmail($email)){
                $_SESSION['msg_email']="Please provide an unique email.";
            }
            if(!isset($_SESSION['msg_email'])){
                //photos
                $ext = explode(".", $photo['name']);
                $ext = $ext[count($ext) - 1];
                $source = $photo['tmp_name'];
                $photo_name = md5(date('Y-m-d H:i:s:u')); //md5 generates Hash
                $photo_name=$photo_name.".".$ext;
                $destination="../models/patient_images/".$photo_name;
                $photo=$destination;
                move_uploaded_file($source,$destination);
                //db
                if(signupPatient($email,$password,$f_name,$l_name,$phone_no,$dob, $gender, $blood_group, $address, $district, $division, $postal_code, $photo)){
                    header("Location: ../views/Login_patient.php");
                }else{
                    $_SESSION['global_msg']="Something went wrong in signup.";
                    header("Location: ../views/Signup_patient.php");
                }
                
            }else{
                header("Location: ../views/Signup_patient.php");
            }
        }else{
        
            header("Location: ../views/Signup_patient.php");
        }
    } else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Signup_patient.php");
    }
?>