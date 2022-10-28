<?php
    session_start();
    include "Validation.php";
    if(!isset($_SESSION['email']) and !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }

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

        if($isValid){
            $filename="../models/patient_data.json";
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $current_data=json_decode($current_data);
                $data=array("email"=>$_SESSION['email'], "password"=>$_SESSION['password'], "fname"=>$_SESSION['fname'],"lname"=>$_SESSION['lname'],"phone"=>$_SESSION['phone'], "dob"=>$_SESSION['dob'],"gender"=>$_SESSION['gender'],"blood_group"=>$_SESSION['blood_group'],"address"=>$_SESSION['address'],"district"=>$_SESSION['district'],"division"=>$_SESSION['division'],"postal_code"=>$_SESSION['postal_code'],"photo"=>$_SESSION['photo'],"security_ques"=>$security_ques, "security_ans"=>$security_ans);
                $current_data[$_SESSION['patient_idx']]=$data;
                $current_data=json_encode($current_data);
			    file_put_contents($filename,$current_data);
                $_SESSION['security_ques']=$security_ques;
                $_SESSION['security_ans']=$security_ans;
            }else{
                $_SESSION['global_msg']="Error in database. Please contact with admin.";
                header("Location: ../views/Updateprofile_patient.php");
            }
        }else{
            //invalid
            header("Location: ../views/Securityquestion.php");
        }
    }else{
        //something went wrong
        header("Location: ../views/Securityquestion.php");
    }
?>