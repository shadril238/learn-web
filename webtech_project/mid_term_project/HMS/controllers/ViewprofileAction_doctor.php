<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_doctor.php");
    }
    // accessing doctor index 
    $index=$_SESSION['doctor_idx'];

    // json read
    $filename= "../models/doctor_data.json";
    if(file_exists($filename)){
        $data=file_get_contents($filename);
        $data= json_decode($data);
        //accessing doctor data
        $row=$data[$index]; 

        $_SESSION['name']=$row->name;
        $_SESSION['password']=$row->password;
        $_SESSION['phone']=$row->phone;
        $_SESSION['dob']=$row->dob;
        $_SESSION['gender']=$row->gender;
        $_SESSION['photo']=$row->photo;
        $_SESSION['security_ques']=$row->security_ques;
        $_SESSION['security_ans']=$row->security_ans;
        $_SESSION['degree']=$row->degree;
        $_SESSION['department']=$row->department;
        //echo $_SESSION['name'];
        header("Location: ../views/Viewprofile_doctor.php");
    }else{
        //file not exist
        $_SESSION['global_msg']="Data not found! Please contact with administration.";
        header("Location: ../views/Viewprofile_doctor.php");
    }
?>
