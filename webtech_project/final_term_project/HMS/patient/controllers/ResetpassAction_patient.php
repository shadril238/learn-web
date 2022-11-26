<?php
    session_start();

    require "Validation.php";
    require "../models/ResetpassDB_patient.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $email=sanitize($_POST['email']);
        $security_ans=sanitize($_POST['security_ans']);
        $password=sanitize($_POST['npassword']);
        $security_ques=sanitize($_POST['security_ques']);
        $cpassword=sanitize($_POST['cpassword']);
        $isValid=true;
        $validUser=false;
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
            $_SESSION['msg_npass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $_SESSION['msg_npass']="Please provide valid password!";
            }
        }	
        //confirm password
        if(empty($cpassword)){
            $isValid=false;
            $_SESSION['msg_cpass']="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($cpassword)){
                $isValid=false;
                $_SESSION['msg_cpass']="Please provide valid confirm password!";
            }
            else if($password!=$cpassword){
                $isValid=false;
                $_SESSION['msg_cpass']="Password and confirm password not matched!";
            } 
        }
        //security ans
        if(empty($security_ans)){
            $isValid=false;
            $_SESSION['msg_securityA']="Security answer can't be empty!";
        }
        //security ques
        if($security_ques===""){
            $isValid=false;
            $_SESSION['msg_securityQ']="Please select the security question properly!";
        }

        ///valid
        if($isValid){
            var_dump(checkSecurity($email,$security_ques, $security_ans));
            if(checkSecurity($email, $security_ques, $security_ans)){
                if(resetPass($email, $password)){
                    /////Important : form redirection and notification
                    $_SESSION['global_msg']="Password successfully changed.";
                    header("Location:../views/Resetpass_patient.php");
                }
                else{
                    $_SESSION['global_msg']="Something went wrong! contract with admin.";
                    header("Location:../views/Resetpass_patient.php");
                }
            }
            else{
                $_SESSION['global_msg']="Security details are incorrect.";
                header("Location:../views/Resetpass_patient.php");
            }
        }else{
            header("Location: ../views/Resetpass_patient.php");
        }
    }else{
        //something went wrong
        $_SESSION['msg_global']="Something went wrong!";
        header("Location: ../../views/patient/Forgotpass_patient.php");
    }
?>