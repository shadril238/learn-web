<?php
    include "Header_pharma.php";
    if(!isset($_SESSION['email']) or !isset($_SESSION['pharmacist_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_pharmacist.php");
    }
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
    <title>View Medicine - Pharmacist</title>
</head>
<body>
    <h1>View Medicine - pharmacist</h1>
    <?php
        $filename="../../models/product_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
            <tr>
                <th>Medicine Name</th>
                <th>Medicine ID</th>
                <th>Medicine Stock</th>
                <th>Unit Price</th>
                <th>Action</th>
                
            </tr>
            <?php
                $index=0;
                foreach($data as $read_data){
                    echo "
                        <tr>
                            <td>".$read_data->product_name."</td>
                            <td>".$read_data->product_id."</td>
                            <td>".$read_data->product_stock."</td>
                            <td>".$read_data->unit_price."</td>
                           
                            <td>
                                <a href='Updatemedicine_pharmacist.php?idx=".$index."'>Update</a>
                                <a href='../../controllers/pharmacist/Deletemedicine_pharmacist.php?idx=".$index."'>Delete</a>
                            </td>
                        </tr>
                        ";
                    $index++;
                }
            ?>
        </tbody>
    </table>
    <?php
    include "Footer_pharma.php";
    ?>

</body>
</html>