<?php
    include "../controllers/Validation.php";

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
        }else{
            //error message
            header("Location: Login_admin.php?msg_email=" . $msg_email. "&msg_pass=" . $msg_pass);
        }

    } else {
		header("Location: Login_admin.php?msg=Something went wrong!");
	}
?>