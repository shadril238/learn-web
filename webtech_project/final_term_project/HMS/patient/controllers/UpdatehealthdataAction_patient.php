<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    require "Validation.php";
    require "../models/UpdatehealthdataDB_patient.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $sleep=sanitize($_POST['asleep']);
        $bph=sanitize($_POST['abph']);
        $bpl=sanitize($_POST['abpl']);
        $heartrate=sanitize($_POST['aheartrate']);
        $water=sanitize($_POST['awater']);
        $exercise=sanitize($_POST['aexercise']);
        $weight=sanitize($_POST['aweight']);
        $isValid=true;

        if(empty($sleep)){
            $_SESSION['msg_sleep']="Sleep hour can't be empty.";
            $isValid=false;
        }
        else{
            if($sleep<0 or $sleep>24){
                $_SESSION['msg_sleep']="Please insert valid sleep hour.";
                $isValid=false;
            }
        }

        if(empty($bph)){
            $_SESSION['msg_bp']="Blood pressure must required.";
            $isValid=false;
        }//else

        if(empty($bpl)){
            $_SESSION['msg_bp']="Blood pressure must required.";
            $isValid=false;
        }//else

        if(empty($heartrate)){
            $_SESSION['msg_heartrate']="Heart rate must required.";
            $isValid=false;
        }//else

        if(empty($water)){
            $_SESSION['msg_dwater']="This field can't be empty.";
            $isValid=false;

        }//else

        if(empty($exercise)){
            $_SESSION['msg_exercise']="This field can't be empty.";
            $isValid=false;
        }//else

        if(empty($weight)){
            $_SESSION['msg_weight']="This field can't be empty.";
            $isValid=false;
        }//else


        if($isValid){
            $res=insertData($sleep,$bph, $bpl, $heartrate, $water, $exercise, $weight);
            if($res){
                echo "1";
            }
            else{
                echo "0";
            }
        }
        else{
            header("location:../views/Updatehealthdata_patient.php");
        }
    }
    else{
        $_SESSION['global_msg']="Something went wrong!";
        header("location:../views/Updatehealthdata_patient.php");
    }
?>