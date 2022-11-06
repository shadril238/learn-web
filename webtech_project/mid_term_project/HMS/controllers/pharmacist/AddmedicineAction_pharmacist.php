<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['pharmacist_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_pharmacist.php");
    }
    include "../Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $mname=sanitize($_POST['mname']);
        $mid=sanitize($_POST['mid']);
        $mstock=sanitize($_POST['mstock']);
        $munit=sanitize($_POST['munit']);
        $isValid=true;
        
        //mname
        if(empty($mname)){
            $_SESSION['msg_mname']="Medicine name can't be empty";
            $isValid=false;
        }
        // mid
        if(empty($mid)){
            $_SESSION['msg_mid']="Medicine name can't be empty";
            $isValid=false;
        }else{
            if($mid<1){
                $_SESSION['msg_mid']="Please provide valid medicine name!";
                $isValid=false;
            }
        }
        //mstock
        if(empty($mstock)){
            $_SESSION['msg_mstock']="Medicine name can't be empty";
            $isValid=false;
        }else{
            if($mstock<1){
                $_SESSION['msg_mstock']="Please provide valid medicine stock";
            $isValid=false;
            }
        }
        //munit
        if(empty($munit)){
            $_SESSION['msg_munit']="Medicine price can't be empty";
            $isValid=false;
        }else{
            if($munit<1){
                $_SESSION['msg_munit']="Please provide valid medicine price";
            $isValid=false;
            }
        }
        
        /// valid
        if($isValid){
            $filename="../../models/product_data.json";
            $array_data=array();
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true); //json array
                /// need to check if medicine id is unique (IMP)
                $data=array("product_id"=>$mid, "product_name"=>$mname, "product_stock"=>$mstock, "unit_price"=>$munit);
                $array_data[]=$data;
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);
            }else{
                $_SESSION['msg_global']="Data does not exist!";
                header("Location: ../../views/pharmacist/Addmedicine_pharmacist.php");
            }
        }else{
            //invalid
            header("Location: ../../views/pharmacist/Addmedicine_pharmacist.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/pharmacist/Addmedicine_pharmacist.php");
    }
?>