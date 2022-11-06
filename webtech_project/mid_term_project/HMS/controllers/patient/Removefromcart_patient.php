<?php
    session_start();

    if(isset($_GET['idx'])){
        $cookie_data=stripslashes($_COOKIE['medicine_cart']);
        $cart_data=json_decode($cookie_data, true);

        foreach($cart_data as $keys=>$values){
            if($cart_data[$keys]['p_id']==$_GET['idx']){
                unset($cart_data[$keys]);
                $product_data=json_encode($cart_data);
                setcookie("medicine_cart",$product_data,time()+(86000*7),'/'); //7 days
                ///remove from cart msg
                header("location: ../../views/patient/Medicinecart_patient.php");
            }
        }
    }
?>