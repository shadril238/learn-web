<?php
    session_start();
    
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
    require "Validation.php";
    require "../models/SecurityquestionDB_patient.php";

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $security_ques=sanitize($_POST['security_ques']);
        $security_ans=sanitize($_POST['security_ans']);
        $isValid=true;

        if($security_ques===""){
            $isValid=false;
            $_SESSION['msg_securityQ']="Please select the security question properly!";
        }

        if(empty($security_ans)){
            $isValid=false;
            $_SESSION['msg_securityA']="Please fill up answer properly!";
        }
        //valid
        if($isValid){
            if(setSecurity($security_ques,$security_ans)){
                $_SESSION['security_ques']=$security_ques;
                $_SESSION['security_ans']=$security_ans;
                header("Location: ../views/Securityquestion_patient.php");
            }
            else{
                $_SESSION['global_msg']="Error in database. Please contact with admin.";
                header("Location: ../views/Securityquestion_patient.php");
            }
        }else{
            //invalid
            header("Location: ../views/Securityquestion_patient.php");
        }
    }else{
        //something went wrong
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Securityquestion_patient.php");
    }
?>