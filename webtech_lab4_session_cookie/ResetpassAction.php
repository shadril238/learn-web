<?php
    include "Validation.php";
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: Login.php");
        exit();
    }

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $security=$_POST["security"];
        $password=$_POST["password"];
        $c_password=$_POST["confirm_password"];

        $isValid=true;
        $msg_sq="";
        $msg_pass="";
        $msg_cpass="";

        //security ques
        if(empty($security)){
            $isValid=false;
            $msg_sq="Please Fillup the Security Question Properly!";
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
        if($isValid ){
            echo $_SESSION["security"]."<br>".$security."<br>";
            if($_SESSION["security"]===$security){
                
                $password=sanitize($password);
                $index=$_SESSION["user_idx"];
                $filename = "data.json";
                $data=file_get_contents($filename);
                $data= json_decode($data);
                $input=array("email"=>$_SESSION["email"], "password"=>$password, "security_ans"=>$_SESSION["security"]);
                $data[$index]=$input;
                $data=json_encode($data);
                file_put_contents($filename,$data);
                echo "Password Reset Successful";
                echo "<br> <a href='SetSecurityQuestion.php'>Security Questiion</a> || <a href='Logout.php'>Logout</a>";
                //redirect
            }else{
                //error message
                echo "error1";
            }
        }else{
            //error message
            echo "error2";
        }
    }
?>