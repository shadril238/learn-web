<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }

    require "Validation.php";
    require "../models/ChangepassDB_patient.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $curr_pass=sanitize($_POST['password']);
        $new_pass=sanitize($_POST['npassword']);
        $confirm_pass=sanitize($_POST['cpassword']);
        $isValid=true;
        //current password
        if(empty($curr_pass)){
            $isValid=false;
            $_SESSION['msg_pass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($curr_pass)){
                $isValid=false;
                $_SESSION['msg_pass']="Please provide valid password!";
            }
        }	
        //new password
        if(empty($new_pass)){
            $isValid=false;
            $_SESSION['msg_npass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($new_pass)){
                $isValid=false;
                $_SESSION['msg_npass']="Please provide valid password!";
            }
        }	
        //confirm new password
        if(empty($confirm_pass)){
            $isValid=false;
            $_SESSION['msg_cpass']="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($confirm_pass)){
                $isValid=false;
                $_SESSION['msg_cpass']="Please provide valid confirm password!";
            }
            else if($new_pass!=$confirm_pass){
                $isValid=false;
                $_SESSION['msg_cpass']="Password and confirm password not matched!";
            } 
        }

        if($isValid){
            //1. check if current pass is valid or not
            var_dump(isValidUser($curr_pass));
            if(isValidUser($curr_pass)){
                //valid user
                if(changePass($new_pass)){
                    $_SESSION['global_msg']="Password Changed successfully.";
                }
                else{
                    $_SESSION['global_msg']="Error in database. Please contract with admin..";
                }
                header("Location: ../views/Changepass_patient.php");
                
            }else{
                $_SESSION['msg_pass']="Please enter the valid current password!";
                header("Location: ../views/Changepass_patient.php");
            }

        }else{
            //not valid
            header("Location: ../views/Changepass_patient.php");
        }

    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Changepass_patient.php");
    }
?>