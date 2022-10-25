<?php
    include "Validation.php";

    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: Login.php");
        exit();
        
    }else{
        echo $_SESSION["email"]."<br>".$_SESSION["user_idx"];
    }   

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $security=$_POST["security"];
        $msg_sq="";
        $isValid=true;

        if(empty($security)){
            $isValid=false;
            $msg_sq="Please Fillup the Security Question Properly!";
        }
        if($isValid){
            $security=sanitize($security);
            $index=$_SESSION["user_idx"];
            $email=$_SESSION["email"];
            $password=$_SESSION["pass"];
            $filename = "data.json";
            $data=file_get_contents($filename);
            $data= json_decode($data);
            //$row=$data[$index];
            $input=array("email"=>$email, "password"=>$password, "security_ans"=>$security);
            $data[$index]=$input;
            //var_dump($data);
            $data=json_encode($data);
            file_put_contents($filename,$data);
            $_SESSION["security"]=$security;
            echo "<br> <a href='Resetpass.php'>Reset Password</a> || <a href='Logout.php'>Logout</a>";
        }else{
            //error message
            header("Location: SetSecurityQuestion.php?msg=".$msg);
        }
    }

?>