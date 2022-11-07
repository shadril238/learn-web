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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Medicine</title>
</head>
<body>
    <h1>Update Medicine</h1>
    <?php
        $index=$_GET['idx'];
        $_SESSION['idx']=$index;
        $filename="../../models/product_data.json";
        $data=file_get_contents($filename);
        $data= json_decode($data,true);
    ?>
    <form method="post" action="../../controllers/pharmacist/UpdatemedicineAction_pharmacist.php" novalidate>

        <label for="mid">Medicine ID : </label>
        <input type="number" id="mid" name="mid" value="<?php echo $data[$index]['product_id']?>" disabled>
        <br>
        <?php
            if(isset($_SESSION['msg_mid'])){
                echo $_SESSION['msg_mid'];
                unset($_SESSION['msg_mid']);
            }
        ?>
        <br>
        <label for="mname">Medicine Name : </label>
        <input type="text" id="mname" name="mname" value="<?php echo $data[$index]['product_name']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_mname'])){
                echo $_SESSION['msg_mname'];
                unset($_SESSION['msg_mname']);
            }
        ?>

        <br>
        <label for="mstock">Medicine Stock : </label>
        <input type="number" id="mstock" name="mstock" value="<?php echo $data[$index]['product_stock']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_mstock'])){
                echo $_SESSION['msg_mstock'];
                unset($_SESSION['msg_mstock']);
            }
        ?>
        <br>
        <label for="munit">Unit Price : </label>
        <input type="number" id="munit" name="munit" value="<?php echo $data[$index]['unit_price']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_munit'])){
                echo $_SESSION['msg_munit'];
                unset($_SESSION['msg_munit']);
            }
        ?>
        <br>
        <input type="submit" value="Update">
    </form>
    <?php
        if(isset($_SESSION['msg_global'])){
            echo $_SESSION['msg_global'];
            unset($_SESSION['msg_global']);
        }
        include "Footer_pharma.php";
    ?>
</body>
</html

