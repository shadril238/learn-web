<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/patient/Login_patient.php");
    }

    include "../Validation.php";

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
                $filename="../../models/patient_data.json";
                if(file_exists($filename)){
                    $current_data=file_get_contents($filename);
                    $current_data=json_decode($current_data);
                    $data=array("email"=>$_SESSION['email'], "password"=>$new_pass, "fname"=>$_SESSION['fname'],"lname"=>$_SESSION['lname'],"phone"=>$_SESSION['phone'], "dob"=>$_SESSION['dob'],"gender"=>$_SESSION['gender'],"blood_group"=>$_SESSION['blood_group'],"address"=>$_SESSION['address'],"district"=>$_SESSION['district'],"division"=>$_SESSION['division'],"postal_code"=>$_SESSION['postal_code'],"photo"=>$_SESSION['photo'],"security_ques"=>$_SESSION['security_ques'], "security_ans"=>$_SESSION['security_ans']);
                    $current_data[$_SESSION['patient_idx']]=$data;
                    $current_data=json_encode($current_data);
                    file_put_contents($filename,$current_data);
                    $_SESSION['password']=$new_pass;
                    header("Location: ../../views/patient/Viewprofile_patient.php");

                }else{
                    $_SESSION['global_msg']="Error in database. Please contact with admin.";
                    header("Location: ../../views/patient/Changepass_patient.php");
                }
            }else{
                $_SESSION['msg_pass']="Please enter the valid current password!";
                header("Location: ../../views/patient/Changepass_patient.php");
            }

        }else{
            //not valid
            header("Location: ../../views/patient/Changepass_patient.php");
        }

    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/patient/Changepass_patient.php");
    }
?>