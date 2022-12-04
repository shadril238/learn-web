<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }

    require "Validation.php";
    require "../models/BookambulanceDB_patient.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $p_location=sanitize($_POST['address']);
        $p_district=sanitize($_POST['district']);
        $p_division=sanitize($_POST['division']);
        $p_postal_code=sanitize($_POST['postal_code']);
        $p_date=sanitize($_POST['date']);
        $p_time=sanitize($_POST['time']);
        $status="pending";
        $isValid=true;

        // address validation
        if(empty($p_location)){
            $isValid=false;
            $_SESSION['msg_addr']="Please fill up the pickup location properly!";
        }

        // district validation
        if($p_district===""){
            $isValid=false;
            $_SESSION['msg_dis']="Please select the district properly!";
        } 
        // division validation
        if($p_division===""){
            $isValid=false;
            $_SESSION['msg_div']="Please select the division properly!";
        }
        // postal code validation
        if(empty($p_postal_code)){
            $isValid=false;
            $_SESSION['msg_postal']="Please fill up the postal code properly!";
        }else{
            if(!isValidPostalCode($p_postal_code)){
                $isValid=false;
                $_SESSION['msg_postal']="Please provide valid postal code!";
            }
        }
        // date validation
        if(empty($p_date)){
            $isValid=false;
            $_SESSION['msg_date']="Please fill up the pickup date properly!";
        }else{
            if(isValidDate($p_date)){
                $isValid=false;
                $_SESSION['msg_date']="Date is invalid (past)!";
            }
        }
        // time validation
        if(empty($p_time)){
            $isValid=false;
            $_SESSION['msg_time']="Please fill up the pickup time properly!";
        }else{
            // need to validate time
        }

        //valid 
        if($isValid){
            //echo $p_date ."<br>".$p_time ."<br>". time(format("HH:MM"));
            if(!checkPending()){
                if(bookAmbulance($p_location,$p_district,$p_division,$p_postal_code,$p_date,$p_time,$status)){
                    //successful
                    header("Location:../views/Bookambulance_patient.php");
                }
                else{
                    $_SESSION['global_msg']="Operation failed!";
                }
            }
            else{
                $_SESSION['global_msg']="User has already a request pending!";
            }
        }else{
            header("Location: ../views/Bookambulance_patient.php");
        }

    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Bookambulance_patient.php");
    }
?>