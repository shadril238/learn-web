<?php 
    session_start();
    include "Validation.php";
    

    if(!isset($_SESSION['email']) and !isset($_SESSION['pharmacist_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_pharmacist.php");
    }

    if($_SERVER['REQUEST_METHOD']==="POST"){
        
        $f_name=sanitize($_POST['fname']);
        $l_name=sanitize($_POST['lname']);
        $phone_no=sanitize($_POST['phn']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $blood_group=sanitize($_POST['blood_group']);
        $address=sanitize($_POST['address']);
        $eduqal=sanitize($_POST['eduqal']);
        $security_ques="";
        $security_ans="";
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

        //education
        if(empty($eduqal)){
            $isValid=false;
            $_SESSION['msg_eduqal']="Please enter Educational Qualification";
        }//else

        
        

        if($isValid){
            $filename="../models/pharmacist_data.json";
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $current_data=json_decode($current_data);
                $data=array("email"=>$_SESSION['email'], "password"=>$_SESSION['password'], "fname"=>$f_name,"lname"=>$l_name,"phone"=>$phone_no, "dob"=>$dob,"gender"=>$gender,"blood_group"=>$blood_group,"address"=>$address,"eduqal"=>$eduqal,"photo"=>$_SESSION['photo'],"security_ques"=>$security_ques, "security_ans"=>$security_ans);
                $current_data[$_SESSION['pharmacist_idx']]=$data;
                $current_data=json_encode($current_data);
			    file_put_contents($filename,$current_data);
                header("Location: ../controllers/ViewprofileAction_pharmacist.php");
            }else{
                $_SESSION['global_msg']="Error in database. Please contact with admin.";
                header("Location: ../views/Updateprofile_pharmacist.php");
            }
        }else{
            //not valid
            header("Location: ../views/Updateprofile_pharmacist.php");
        }


    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Updateprofile_pharmacist.php");
    }
?>
