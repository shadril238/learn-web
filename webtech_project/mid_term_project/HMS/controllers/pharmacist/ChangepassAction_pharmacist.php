<?php
    session_start();
    include "Validation.php";
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
            if($_SESSION['password']===$curr_pass){
                //valid
                $filename="../models/pharmacist_data.json";
                if(file_exists($filename)){
                    $current_data=file_get_contents($filename);
                    $current_data=json_decode($current_data);
                    $data=array("email"=>$_SESSION['email'], "password"=>$new_pass, "fname"=>$_SESSION['fname'],"lname"=>$_SESSION['lname'],"phone"=>$_SESSION['phone'], "dob"=>$_SESSION['dob'],"gender"=>$_SESSION['gender'],"blood_group"=>$_SESSION['blood_group'],"address"=>$_SESSION['address'], "eduqal"=>$_SESSION['eduqal'],"photo"=>$_SESSION['photo'],"security_ques"=>$_SESSION['security_ques'], "security_ans"=>$_SESSION['security_ans']);
                    $current_data[$_SESSION['pharmacist_idx']]=$data;
                    $current_data=json_encode($current_data);
                    file_put_contents($filename,$current_data);
                    $_SESSION['password']=$new_pass;
                }else{
                    $_SESSION['global_msg']="Error in database. Please contact with pharmacist.";
                    header("Location: ../views/Changepass_pharmacist.php");
                }
            }else{
                $_SESSION['msg_pass']="Please enter the valid current password!";
                header("Location: ../views/Changepass_pharmacist.php");
            }

        }else{
            //not valid
            header("Location: ../views/Changepass_pharmacist.php");
        }

    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Changepass_pharmacist.php");
    }
?>