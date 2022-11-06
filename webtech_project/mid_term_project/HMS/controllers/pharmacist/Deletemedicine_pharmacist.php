<?php 
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['pharmacist_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/pharmacist/Login_pharmacist.php");
    }
    $index=$_GET['idx'];
    $filename="../../models/product_data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data);
    unset($data[$index]); 
    $data=array_values($data);
    file_put_contents($filename,json_encode($data));
    ///echo $index;
    header("location:../../views/pharmacist/Viewmedicine_pharmacist.php");
?>