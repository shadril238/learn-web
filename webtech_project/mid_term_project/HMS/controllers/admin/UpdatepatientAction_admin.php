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
        $address=sanitize($_POST['address']);
        $district=sanitize($_POST['district']);
        $division=sanitize($_POST['division']);
        $postal_code=sanitize($_POST['postal_code']);

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

        /// valid
        if($isValid){
            $filename="../../models/patient_data.json";
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $current_data=json_decode($current_data,true); //json array
                //$data=array("email"=>$_SESSION['email'], "password"=>$_SESSION['password'], "fname"=>$f_name,"lname"=>$l_name,"phone"=>$phone_no, "dob"=>$dob,"gender"=>$gender,"blood_group"=>$blood_group,"address"=>$address,"district"=>$district,"division"=>$division,"postal_code"=>$postal_code,"photo"=>$_SESSION['photo'],"security_ques"=>$security_ques, "security_ans"=>$security_ans);
                $current_data[$_SESSION['idx']]['fname']=$f_name;
                $current_data[$_SESSION['idx']]['lname']=$l_name;
                $current_data[$_SESSION['idx']]['dob']=$dob;
                $current_data[$_SESSION['idx']]['gender']=$gender;
                $current_data[$_SESSION['idx']]['blood_group']=$blood_group;
                $current_data[$_SESSION['idx']]['address']=$address;
                $current_data[$_SESSION['idx']]['district']=$district;
                $current_data[$_SESSION['idx']]['division']=$division;
                $current_data[$_SESSION['idx']]['postal_code']=$postal_code;

                $current_data=json_encode($current_data);
			    file_put_contents($filename,$current_data);

                unset($_SESSION['idx']);
                header("Location: ../../views/admin/Viewpatient_admin.php");
            }else{
                $_SESSION['msg_global']="Data does not exist!";
                header("Location: ../../views/admin/Updatepatient_admin.php");
            }
        }else{
            //invalid
            header("Location: ../../views/admin/Updatepatient_admin.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/admin/Updatepatient_admin.php");
    }
    

?>
