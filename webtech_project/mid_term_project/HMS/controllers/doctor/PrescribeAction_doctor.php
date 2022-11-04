<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/doctor/Login_doctor.php");
    }
    include "../Validation.php";
    $index=$_SESSION['idx'];

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $pres=sanitize($_POST['pres']);

        $isValid=true;
        if(empty($pres)){
            $isValid=false;
            $_SESSION['msg_pres']="Please write the prescription properly!";
        }
        if($isValid){
            $filename="../../models/doctor_appointment_data.json";
            if(file_exists($filename)){
                $data=file_get_contents($filename);
                $data= json_decode($data,true);
                $data[$index]['status']="Completed";
                $data[$index]['prescribe']=$pres;
                $data=json_encode($data);
                file_put_contents($filename,$data);
                //echo $_SESSION['idx'];
                unset($_SESSION['idx']);
                header("Location: ../../views/doctor/Prescribe_doctor.php");

            }else{
                $_SESSION['global_msg']="Data not found! Contact with admin...";
                header("Location: ../../views/doctor/Prescribe_doctor.php");
            }

        }else{
            header("Location: ../../views/doctor/Prescribe_doctor.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/doctor/Prescribe_doctor.php");
    } 
?>