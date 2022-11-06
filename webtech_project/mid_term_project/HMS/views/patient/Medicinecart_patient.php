<?php
    session_start();
    include "../../controllers/Validation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!--Table Border Style-->
     <style> 
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Cart</title>
</head>
<body>
    <h1>Medicine Cart</h1>
    <table>
        <tbody>
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php
                if(isset($_COOKIE['medicine_cart'])){
                    $total=0;
                    $cookie_data=stripslashes($_COOKIE['medicine_cart']);
                    $cart_data=json_decode($cookie_data, true);
                    ///var_dump($cart_data);
                    foreach($cart_data as $keys=>$values){
            ?>
                <tr>
                    <td><?php echo $values['p_name']?></td>
                    <td><?php echo $values['p_qty']?></td>
                    <td><?php echo $values['p_price']?></td>
                    <td><?php echo ($values['p_price']*$values['p_qty'])?></td>
                    <td><a href="../../controllers/patient/Removefromcart_patient.php?idx=<?php echo $values['p_id'];?>">Remove</a></td>
                </tr>
                <?php
                        $total += ($values['p_price']*$values['p_qty']);
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total Amount</td>
                    <td><?php echo $total?></td>
                    <td><a href="../../controllers/patient/MedicineorderAction_patient.php">Place Order</a></td>
                </tr>
            <?php
                }else{
                    echo "error";
                }
            ?>
                
        </tbody>
    </table>
</body>
</html>