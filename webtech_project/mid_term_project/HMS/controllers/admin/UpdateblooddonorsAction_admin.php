<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['admin_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_admin.php");
    }
    include "../Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $name=sanitize($_POST['name']);
        $bg=sanitize($_POST['blood_group']);
        $age=sanitize($_POST['age']);
        $gender=sanitize($_POST['gender']);
        $location=sanitize($_POST['address']);
        $phn=sanitize($_POST['phn']);

        $isValid=true;
        
        //name
        if(empty($name)){
            $isValid=false;
            $_SESSION['msg_fname']="Please fill up the first name properly!";
        } else {
            if(!isValidName($name)) {
                $isValid=false;
                $_SESSION['msg_name']="First name is invalid!";
            }
        }

        //blood group
        if($bg==""){
            $isValid=false;
            $_SESSION['msg_bg']="Please select the blood group properly!";
        }
        // age
        if(empty($age)){
            $isValid=false;
            $_SESSION['msg_age']="Please fill up the age properly!";
        }else{
            if($age<18 or $age>50){
                $isValid=false;
                $_SESSION['msg_age']="Age must be between 18-50";
            }
        }

        //gender
        if(!isset($gender)){
            $isValid=false;
            $_SESSION['msg_gender']="Please fill up the gender properly!";
        }

        //location
        if(empty($location)){
            $isValid=false;
            $_SESSION['msg_addr']="Please fill up the address line 1 properly!";
        }
        ///phn
        if(empty($phn)){
            $isValid=false;
            $_SESSION['msg_phn']="Please fill up the phone no properly!";
        }else{
            if(!isValidPhone($phn)){
                $isValid=false;
                $_SESSION['msg_phn']="Please provide valid phone no!";
            }
        }

        /// valid
        if($isValid){
            $filename="../../models/blood_donors_data.json";
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data); //json object
                $data=array("name"=>$name, "blood_group"=>$bg, "age"=>$age, "gender"=>$gender, "location"=>$location, "phn_no"=>$phn);
                $array_data[$_SESSION['idx']]=$data;
                unset($_SESSION['idx']);
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);

                header("Location: ../../views/admin/Viewblooddonors_admin.php");
            }else{
                $_SESSION['msg_global']="Data does not exist!";
                header("Location: ../../views/admin/Updateblooddonors_admin.php");
            }
        }else{
            //invalid
            header("Location: ../../views/admin/Updateblooddonors_admin.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/admin/Updateblooddonors_admin.php");
    }

?>
