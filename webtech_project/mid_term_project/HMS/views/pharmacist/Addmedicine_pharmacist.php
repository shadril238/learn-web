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
    <title>Add Medicine</title>
</head>
<body>
    <h1>Add Medicine</h1>
    <form method="post" action="../../controllers/pharmacist/AddmedicineAction_pharmacist.php" novalidate>

        <label for="mid">Medicine ID : </label>
        <input type="number" id="mid" name="mid">
        <br>
        <?php
            if(isset($_SESSION['msg_mid'])){
                echo $_SESSION['msg_mid'];
                unset($_SESSION['msg_mid']);
            }
        ?>
        <br>
        <label for="mname">Medicine Name : </label>
        <input type="text" id="mname" name="mname" >
        <br>
        <?php
            if(isset($_SESSION['msg_mname'])){
                echo $_SESSION['msg_mname'];
                unset($_SESSION['msg_mname']);
            }
        ?>

        <br>
        <label for="mstock">Medicine Stock : </label>
        <input type="number" id="mstock" name="mstock">
        <br>
        <?php
            if(isset($_SESSION['msg_mstock'])){
                echo $_SESSION['msg_mstock'];
                unset($_SESSION['msg_mstock']);
            }
        ?>
        <br>
        <label for="munit">Unit Price : </label>
        <input type="number" id="munit" name="munit" >
        <br>
        <?php
            if(isset($_SESSION['msg_munit'])){
                echo $_SESSION['msg_munit'];
                unset($_SESSION['msg_munit']);
            }
        ?>
        <br>
        <input type="submit" value="ADD">
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

