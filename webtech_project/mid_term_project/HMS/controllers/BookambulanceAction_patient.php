<?php
    include "Validation.php";
    session_start();
    if(!isset($_SESSION['email']) and !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }


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
            if(!isValidDate($p_date)){
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

            $filename="../models/ambulance_data.json";
            $array_data=array();
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                ///checking if a request already pending
                if(!is_null($array_data)){
                    foreach($array_data as $rd){
                        if($rd['user_email']===$_SESSION['email'] and $rd['status']==="pending"){
                            $_SESSION['global_msg']="You have a request already pending!";
                            break;
                        }
                    }
                }else{
                    $_SESSION['global_msg']="Data not found! Contract with admin...";
                    header("Location: ../views/Bookambulance_patient.php");
                }
                // $current_data=json_encode($current_data);
			    // file_put_contents($filename,$current_data);
                //header("Location: ../");
            }
            if(!isset($_SESSION['global_msg'])){
                $data=array("user_email"=>$_SESSION['email'], "pickup_location"=>$p_location,"pickup_district"=> $p_district, "pickup_division"=>$p_division,"pickup_postal_code"=>$p_postal_code, "pickup_date"=>$p_date, "pickup_time"=>$p_time, "status"=>$status);
                $array_data[]=$data;
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);
            }else{
                header("Location: ../views/Bookambulance_patient.php");
            }
        }else{
            //not valid
            header("Location:../views/Bookambulance_patient.php");
        }

    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../views/Bookambulance_patient.php");
    }
?>