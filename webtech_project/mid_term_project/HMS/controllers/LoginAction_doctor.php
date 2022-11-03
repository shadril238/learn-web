<?php
    session_start();
    include "../controllers/Validation.php";
    
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

        if($isValid){
            $email=sanitize($email);
            $password=sanitize($password);

            //read json data
            $filename="../models/doctor_data.json";
            $array_data=array();
           
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                $doctor_idx=-1; //doctor index
                foreach($array_data as $read_data){
                    $doctor_idx++;
                    if($read_data['email']===$email and $read_data['password']===$password){
                        //valid doctor
                        $_SESSION["email"]=$email;
                        //$_SESSION["password"]=$password;
                        $_SESSION["doctor_idx"]=$doctor_idx;
                        break;
                    }
                }
                if(isset($_SESSION['email']) and isset($_SESSION['doctor_idx'])){
                    echo "Logged in successfully!";
                    ///header("Location: ../controllers/ViewprofileAction_patient.php");
                    //echo "<a href = ""
                    header("Location: ../controllers/ViewprofileAction_doctor.php");

                }else{
                    $_SESSION['global_msg']="Email and password not matched!";
                    header("Location: ../views/Login_doctor.php");
                }
            }else{
                //file not exist
                $_SESSION['global_msg']="Doctor data not available. Please contact with admin.";
                header("Location: ../views/Login_doctor.php");
            }
        }else{
            //error
            header("Location: ../views/Login_doctor.php");
        }

    }else{
        //error
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Login_doctor.php");
    }
?>