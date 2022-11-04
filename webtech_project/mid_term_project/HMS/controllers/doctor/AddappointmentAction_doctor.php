<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/doctor/Login_doctor.php");
    }

    include "../Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $date=sanitize($_POST['date']);
        $time=sanitize($_POST['time']);
        $isValid=true;

        // date validation
        if(empty($date)){
            $isValid=false;
            $_SESSION['msg_date']="Please fill up the pickup date properly!";
        }else{
            if(!isValidDate($date)){
                $isValid=false;
                $_SESSION['msg_date']="Date is invalid (past)!";
            }
        }
        // time validation
        if(empty($time)){
            $isValid=false;
            $_SESSION['msg_time']="Please fill up the pickup time properly!";
        }else{
            // need to validate time
        }
        if($isValid){
            $filename="../../models/doctor_appointment_data.json";
            $array_data=array();
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                if(!is_null($array_data)){
                    foreach($array_data as $rd){
                        //checking time clash
                        if($rd['adate']===$date and $rd['atime']===$time){
                            $_SESSION['global_msg']="Time Clashed!";
                            break;
                        }
                    }
                }
            }else{
                $_SESSION['global_msg']="Data not found! Contact with admin...";
                header("Location: ../../views/doctor/Addappointment_doctor.php");
            }

            if(!isset($_SESSION['global_msg'])){
                $data=array("demail"=>$_SESSION['email'],"dname"=>$_SESSION['name'], "degree"=>$_SESSION['degree'],"department"=>$_SESSION['department'],"adate"=>$date,"atime"=>$time,"pemail"=>"","pname"=>"","status"=>"Available","prescribe"=>"");
                $array_data[]=$data;
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);
            }else{
                header("Location: ../../views/doctor/Addappointment_doctor.php");
            }
        }else{
            header("Location: ../../views/doctor/Addappointment_doctor.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/doctor/Addappointment_doctor.php");
    }
?>