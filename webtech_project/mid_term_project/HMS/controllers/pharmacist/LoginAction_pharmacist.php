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

        if($isValid){
            $email=sanitize($email);
            $password=sanitize($password);

            //read json data
            $filename="../../models/pharmacist_data.json";
            $array_data=array();
           
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
                $array_data=json_decode($current_data, true);
                $pharmacist_idx=-1; //pharmacist index
                foreach($array_data as $read_data){
                    $pharmacist_idx++;
                    if($read_data['email']===$email and $read_data['password']===$password){
                        //valid pharmacist
                        $_SESSION["email"]=$email;
                        //$_SESSION["password"]=$password;
                        $_SESSION["pharmacist_idx"]=$pharmacist_idx;
                        break;
                    }
                }
                if(isset($_SESSION['email'])){
                    echo "Logged in successfully!";
                    //dashboard
                }else{
                    $_SESSION['global_msg']="Email and password not valid!";
                    header("Location: ../../views/pharmacist/Login_pharmacist.php");
                }
            }else{
                //file not exist
                $_SESSION['global_msg']="Pharmacist data not available";
                header("Location: ../../views/pharmacist/Login_pharmacist.php");
            }
        }else{
            //error
            header("Location: ../../views/pharmacist/Login_pharmacist.php");
        }
    }else{
        //error
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/pharmacist/Login_pharmacist.php");
    }
?>