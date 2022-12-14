<?php
    session_start();
    require "Validation.php";
    require "../models/LoginDB_patient.php";
    
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $email=sanitize($_POST['email']);
        $password=sanitize($_POST['password']);
        $isValid=true;

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
        ///valid
        if($isValid){
            $isValid=false;
            if(credentials($email, $password)){
                $isValid=true;
            }
            else{
                $_SESSION['global_msg'] = "Invalid email or password.";
				header("Location: ../views/Login_patient.php");
            }       

            if($isValid){
                $_SESSION["email"]=$email;
                //homepage (view profile)
                header("Location: ../controllers/ViewprofileAction_patient.php");
            }
        }
        else{
            header("Location: ../views/Login_patient.php");
        }
    }
    else{
        //error
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Login_patient.php");
    }
?>