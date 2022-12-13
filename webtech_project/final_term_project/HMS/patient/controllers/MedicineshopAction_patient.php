<?php
    session_start();
    include "Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $p_id=sanitize($_POST['id']);
        $p_name=sanitize($_POST['name']);
        $p_price=sanitize($_POST['price']);
        $p_qty=sanitize($_POST['qty']);
        $isValid=true;

        //qty validation
        if(empty($p_qty)){
            $isValid=false;
            $_SESSION['msg_global']="Quantity can't be empty!";
        }else{
            if($p_qty<1 or $p_qty>100){ //assuming maximum quantity limit=100
                $isValid=false;
                $_SESSION['msg_global']="Quantity must be between 1 to 100 !";
            }
        }
        //valid
        if($isValid){
            ///echo $p_name." ".$p_id." ".$p_qty." ".$p_price;
            if(isset($_COOKIE['medicine_cart'])){
                //if cookie is set the import cookie data
                $cookie_data=stripslashes($_COOKIE['medicine_cart']);
                $cart_data=json_decode($cookie_data, true);
            }else{
                $cart_data=array();
            }
            // checking the duplicate items in cart
            $list_pid=array_column($cart_data,"p_id");
            if(in_array($p_id,$list_pid)){
                foreach($cart_data as $keys=>$values){
                    if($cart_data[$keys]["p_id"]===$p_id){
                        $cart_data[$keys]["p_qty"]+=$p_qty;
                    }
                }
            }else{
                //new data
                $product_array=array("p_id"=>$p_id, "p_name"=>$p_name, "p_price"=>$p_price, "p_qty"=>$p_qty);
                $cart_data[]=$product_array;
            }
            
            var_dump($cart_data);
            $product_data=json_encode($cart_data);
            
            setcookie("medicine_cart",$product_data,time()+(86000*7),'/'); //7 days
            header("Location:../views/Medicineshop_patient.php");
        }else{
            header("Location: ../views/Medicineshop_patient.php");
        }
        
    }else{
        $_SESSION['msg_global']="Something went wrong!";
        header("Location: ../../views/patient/Medicineshop_patient.php");
    }
?>