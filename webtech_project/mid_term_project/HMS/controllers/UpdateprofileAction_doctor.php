<?php 
    session_start();
    include "Validation.php";
    
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }

    if($_SERVER['REQUEST_METHOD']==="POST"){
        
        $name=sanitize($_POST['name']);
        $phone_no=sanitize($_POST['phn']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $degree=sanitize($_POST['degree']);
        $dept=sanitize($_POST['dept']);
        $isValid=true;

        //Name
        if(empty($name)){
            $isValid=false;
            $_SESSION['msg_name']="Please fill up the name properly!";
        } else {
            if(!isValidName($name)) {
                $isValid=false;
                $_SESSION['msg_name']="Name is invalid!";
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
        } 
        //gender
        if(!isset($gender)){
            $isValid=false;
            $_SESSION['msg_gender']="Please fill up the gender properly!";
        } 
         //degree
         if(empty($degree)){
            $isValid=false;
            $_SESSION['msg_degree']="Please fill up the degree properly!";
        } ///else - need further validation [Degree holds only Character]
        //department
        if(empty($dept)){
            $isValid=false;
            $_SESSION['msg_dept']="Please fill up the department properly!";
        }//else - need further validation [Dept holds only Character]

        if($isValid){
            $filename="../models/doctor_data.json";
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $current_data=json_decode($current_data);
                $data=array("email"=>$_SESSION['email'], "password"=>$_SESSION['password'], "name"=>$name,"degree"=>$degree,"department"=>$dept,"phone"=>$phone_no, "dob"=>$dob,"gender"=>$gender,"photo"=>$_SESSION['photo'],"security_ques"=>$_SESSION['security_ques'], "security_ans"=>$_SESSION['security_ans']);
                $current_data[$_SESSION['doctor_idx']]=$data;
                $current_data=json_encode($current_data);
			    file_put_contents($filename,$current_data);
                header("Location: ../controllers/ViewprofileAction_doctor.php");
            }else{
                header("Location: ../views/Updateprofile_doctor.php");
            }
        }else{
            header("Location: ../views/Updateprofile_doctor.php");
        }

    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Updateprofile_doctor.php");
    }
?>