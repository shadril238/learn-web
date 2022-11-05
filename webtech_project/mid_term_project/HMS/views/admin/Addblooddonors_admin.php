<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['admin_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blood Donors</title>
</head>
<body>
    <h1>Add Blood Donors</h1>

    <form action="../../controllers/admin/AddblooddonorsAction_admin.php" method="POST" novalidate>
    <label for="name">Name : </label>
        <input type="text" id="name" name="name">
        <br>
        <?php
            if(isset($_SESSION['msg_name'])){
                echo $_SESSION['msg_name'];
                unset($_SESSION['msg_name']);
            }
        ?>
        <br>

        <label for="bg">Blood Group : </label>
        <select name="blood_group" id="bg">
            <option value="">Select here</option>
            <option value="A+">A(+ve)</option>
            <option value="A-">A(-ve)</option>
            <option value="B+">B(+ve)</option>
            <option value="B-">B(-ve)</option>
            <option value="O+">O(+ve)</option>
            <option value="O-">O(-ve)</option>
            <option value="AB+">AB(+ve)</option>
            <option value="AB-">AB(-ve)</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_bg'])){
                echo $_SESSION['msg_bg'];
                unset($_SESSION['msg_bg']);
            }
        ?>
        <br>

        <label for="age">Age : </label>
        <input type="number" name="age" id="age">
        <br>
        <?php
            if(isset($_SESSION['msg_age'])){
                echo $_SESSION['msg_age'];
                unset($_SESSION['msg_age']);
            }
        ?>
        <br>

        <label for="gender">Gender : </label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
        <br>
        <?php
            if(isset($_SESSION['msg_gender'])){
                echo $_SESSION['msg_gender'];
                unset($_SESSION['msg_gender']);
            }
        ?>
        <br>

        <label for="addr">Location : </label>
        <textarea id="addr" name="address" cols="20" rows="1"></textarea>
        <br>
        <?php
            if(isset($_SESSION['msg_addr'])){
                echo $_SESSION['msg_addr'];
                unset($_SESSION['msg_addr']);
            }
        ?>
        <br>

        <label for="phn">Phone no : </label>
        <input type="text" name="phn" id="phn">
        <br>
        <?php
            if(isset($_SESSION['msg_phn'])){
                echo $_SESSION['msg_phn'];
                unset($_SESSION['msg_phn']);
            }
        ?>
        <br>
        <input type="submit" value="Add">
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>