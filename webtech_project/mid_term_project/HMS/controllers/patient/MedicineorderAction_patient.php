<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/patient/Login_patient.php");
    }
    include "../../views/patient/Medicinecart_patient.php";

    //stock products data from json file
    $filename="../../models/product_data.json";
    $data=file_get_contents($filename);
    $data=json_decode($data, true);

    //cart data from cookie
    if(isset($_COOKIE['medicine_cart'])){
        $total=0;
        $cookie_data=stripslashes($_COOKIE['medicine_cart']);
        $cart_data=json_decode($cookie_data, true);

        foreach($cart_data as $keys=>$values){
            $index=0;
            foreach($data as $rd){
                if($values['p_id']===$rd['product_id']){
                    
                    $data[$index]['product_stock']-=$values['p_qty'];
                    break;
                }
                $index++;
            }

        }
        $data=json_encode($data);
        file_put_contents($filename,$data);
    }else{
        //no data in cart
    }








?>