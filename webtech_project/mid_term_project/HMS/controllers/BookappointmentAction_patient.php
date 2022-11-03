<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
    //echo $_SESSION['index'];

    $index=$_SESSION['index'];
    $filename="../models/doctor_appointment_data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data,true);
    ///$data=array("demail"=>$_SESSION['email'],"dname"=>$_SESSION['name'], "degree"=>$_SESSION['degree'],"department"=>$_SESSION['department'],"adate"=>$date,"atime"=>$time,"pemail"=>"","pname"=>"");
    $data[$index]['pemail']=$_SESSION['email'];
    $data[$index]['pname']=$_SESSION['fname']." ".$_SESSION['lname'] ;
    $data=json_encode($data);
    file_put_contents($filename,$data);

?>