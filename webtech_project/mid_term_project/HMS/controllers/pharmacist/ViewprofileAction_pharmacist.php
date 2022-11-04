<?php
    session_start();
    if(!isset($_SESSION['email']) and !isset($_SESSION['pharmacist_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_pharmacist.php");
    }
    // accessing pharmacist index 
    $index=$_SESSION['pharmacist_idx'];

    // json read
    $filename= "../models/pharmacist_data.json";
    if(file_exists($filename)){
        $data=file_get_contents($filename);
        $data= json_decode($data);
        //accessing pharmacist data
        $row=$data[$index]; 

        $_SESSION['fname']=$row->fname;
        $_SESSION['lname']=$row->lname;
        $_SESSION['password']=$row->password;
        $_SESSION['phone']=$row->phone;
        $_SESSION['dob']=$row->dob;
        $_SESSION['gender']=$row->gender;
        $_SESSION['blood_group']=$row->blood_group;
        $_SESSION['address']=$row->address;
        $_SESSION['eduqal']=$row->eduqal;
        $_SESSION['photo']=$row->photo;
        $_SESSION['security_ques']=$row->security_ques;
        $_SESSION['security_ans']=$row->security_ans;
        header("Location: ../views/Viewprofile_pharmacist.php");
    }else{
        //file not exist
        $_SESSION['global_msg']="Data not found! Please contact with administration.";
        header("Location: ../views/Viewprofile_pharmacist.php");
    }
?>
