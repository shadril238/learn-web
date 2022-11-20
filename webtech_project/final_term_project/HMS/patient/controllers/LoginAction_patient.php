<?php
    session_start();

    include "Validation.php";
    
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
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
            $email=sanitize($email);
            $password=sanitize($password);
            //database auth.
            include_once "../models/LoginDB_patient.php";
            if($p_email===$email and $p_pass===$password){
                $_SESSION["email"]=$email;
                //homepage (view profile)
                header("Location: ../controllers/ViewprofileAction_patient.php");
                mysqli_close($conn);
            }
            else{
                $_SESSION['global_msg'] = "Email or password incorrect";
				header("Location: ../views/Login_patient.php");
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