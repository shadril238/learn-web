<?php
    include "Validation.php";
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $c_password=$_POST['confirm_password'];

        //error message
        $msg_email="";
        $msg_pass="";
        $msg_cpass="";
        $isValid=true;

        //email
        if(empty($email)) {
			$isValid=false;
            $msg_email="Please fill up the email properly!";
		} else{
            if(!isValidEmail($email)){
                $isValid=false;
                $msg_email="Please provide valid email address!";
            }
        }

        //password
        if(empty($password)){
            $isValid=false;
            $msg_pass="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $msg_pass="Please provide valid password!";
            }
        }

        //confirm password
        if(empty($c_password)){
            $isValid=false;
            $msg_cpass="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($c_password)){
                $isValid=false;
                $msg_cpass="Please provide valid confirm password!";
            }
            else if($password!=$c_password){
                $isValid=false;
                $msg_cpass="Password and confirm password not matched!";
            }
            
        }

        //valid or not
        if($isValid){
            //need to code
            echo $email."<br>".$password."<br>".$c_password."<br>";

            //json file
            $filename = "data.json";
            $data = array("email"=>$email,"password"=>$password,"security_ans"=>"");
            $array_data=array();
            $email_exist=false;
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                
                if(!is_null($array_data)){
                    foreach($array_data as $rd){
                        if($rd["email"] === $email){
                            $email_exist=true;
                            break;
                        }
                    }
                }
            }
            if(!$email_exist){
                $array_data[]=$data;
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);
            }else{
                $msg_email="Email must be unique!";
                //error message
                header("Location: Signup.php?msg_email=" . $msg_email."&msg_pass=".$msg_pass."&msg_cpass=".$msg_cpass);
            }
        }else{
            //error message
            header("Location: Signup.php?msg_email=" . $msg_email."&msg_pass=".$msg_pass."&msg_cpass=".$msg_cpass);
        }
        echo "<br> <br>";
        echo "<a href='Login.php'>Login</a>";

    }

?>