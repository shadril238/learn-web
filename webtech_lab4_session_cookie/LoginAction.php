<?php
    include "Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){

        $email=$_POST['email'];
        $password=$_POST['password'];
        $isValid=true;
        $msg_email="";
        $msg_pass="";

        //Email 
        if (empty($email)) {
			$isValid=false;
            $msg_email="Please fill up the email properly!";
		} else{
            if(!isValidEmail($email)){
                $isValid=false;
                $msg_email="Please provide valid email address!";
            }
        }
        //Password 
        if(empty($password)){
            $isValid=false;
            $msg_pass="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $msg_pass="Please provide valid password!";
            }
        }	
        // Valid or not
        if($isValid){
            $email=sanitize($email);
            $password=sanitize($password);
            //form data
            echo $email ." ".$password . "<br>";

            //reading email and password from json file
            $filename = "data.json";
            $array_data=array();
            $user_idx=0; //user index
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                $valid_user=false;
                foreach($array_data as $rd){
                    if($rd["email"] === $email and $rd["password"]===$password){
                        //session starts if valid user
                        session_start();
                        $_SESSION["email"]=$email;
                        $_SESSION["user_idx"]=$user_idx;
                        $_SESSION["pass"]=$password;
                        $_SESSION["security"]=$rd["security_ans"];
                        break;
                    }
                    $user_idx++;
                }
                if(isset($_SESSION["email"])){
                    echo "Logged in successfully! <br>";
                    echo "<a href='SetSecurityQuestion.php'>Security Question</a> ||<a href='Logout.php'>Log out</a> <br>";
                }
                else{
                    header("Location: Login.php?msg=" . $msg);
                }
            }



            
        }else{
            //error message
            header("Location: Login.php?msg_email=" . $msg_email. "&msg_pass=" . $msg_pass);
        }

    } else {
		header("Location: Login.php?msg=Something went wrong!");
	}
?>