<?php
    session_start();
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
    <title>Medicine Shop</title>
</head>
<body>
    <?php
        $filename="../../models/product_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <h1>Medicine Shop</h1>
    <br>
    <?php
        if(isset($_SESSION['msg_global'])){
            echo $_SESSION['msg_global'];
            unset($_SESSION['msg_global']);
        }
    ?>
    <br>
    <table>
        <tbody>
            <tr>
                <th>Medicine Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php
                foreach($data as $read_data)
                {
            ?>
            <form action="../../controllers/patient/MedicineshopAction_patient.php" method="POST" novalidate>
                <tr>
                    <td><?php echo $read_data->product_name ?></td>
                    <td><?php echo $read_data->unit_price." tk"?></td>
                    <td> <input type='number' name='qty' value=1> </td>

                    <input type='hidden' name='id' value=<?php echo $read_data->product_id ?>>
                    <input type='hidden' name='name' value=<?php echo $read_data->product_name ?>>
                    <input type='hidden' name='price' value=<?php echo $read_data->unit_price ?>>
                    <td> <input type='submit' value='Add to Cart'> </td>
                </tr>
            </form>
            <?php
                }
            ?> 
        </tbody>
    </table>
</body>
</html>