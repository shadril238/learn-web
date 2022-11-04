<?php
    session_start();

    include "../Validation.php";
    
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $isValid=true;

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
            $_SESSION['msg_pass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $_SESSION['msg_pass']="Please provide valid password!";
            }
        }
        ///valid
        if($isValid){
            $email=sanitize($email);
            $password=sanitize($password);

            //read json data
            $filename="../../models/patient_data.json";
            $array_data=array();
           
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                $patient_idx=-1; //patient index
                foreach($array_data as $read_data){
                    $patient_idx++;
                    if($read_data['email']===$email and $read_data['password']===$password){
                        //valid patient
                        $_SESSION["email"]=$email;
                        //$_SESSION["password"]=$password;
                        $_SESSION["patient_idx"]=$patient_idx;
                        break;
                    }
                }
                if(isset($_SESSION['email']) and isset($_SESSION['patient_idx'])){
                    echo "Logged in successfully!";
                    header("Location: ViewprofileAction_patient.php");
                    //need to add homepage here
                }else{
                    $_SESSION['global_msg']="Email and password not matched!";
                    header("Location: ../../views/patient/Login_patient.php");
                }
            }else{
                //file not exist
                $_SESSION['global_msg']="Patient data not available. Please contact with admin.";
                header("Location: ../../views/patient/Login_patient.php");
            }
        }else{
            //error
            header("Location: ../../views/patient/Login_patient.php");
        }
    }else{
        //error
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/patient/Login_patient.php");
    }
?>