<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/patient/Login_patient.php");
    }
    // accessing patient index 
    $index=$_SESSION['patient_idx'];

    // json read
    $filename= "../../models/patient_data.json";
    if(file_exists($filename)){
        $data=file_get_contents($filename);
        $data= json_decode($data);
        //accessing patient data
        $row=$data[$index]; 

        $_SESSION['fname']=$row->fname;
        $_SESSION['lname']=$row->lname;
        $_SESSION['password']=$row->password;
        $_SESSION['phone']=$row->phone;
        $_SESSION['dob']=$row->dob;
        $_SESSION['gender']=$row->gender;
        $_SESSION['blood_group']=$row->blood_group;
        $_SESSION['address']=$row->address;
        $_SESSION['district']=$row->district;
        $_SESSION['division']=$row->division;
        $_SESSION['postal_code']=$row->postal_code;
        $_SESSION['photo']=$row->photo;
        $_SESSION['security_ques']=$row->security_ques;
        $_SESSION['security_ans']=$row->security_ans;
        header("Location: ../../views/patient/Viewprofile_patient.php");
    }else{
        //file not exist
        $_SESSION['global_msg']="Data not found! Please contact with administration.";
        header("Location: ../../views/patient/Viewprofile_patient.php");
    }
?>
