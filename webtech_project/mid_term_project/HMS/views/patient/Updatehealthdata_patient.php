<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Health Data</title>
</head>
<body>
    <h1>Update Your Daily Health Data</h1>
    <form action="../../controllers/patient/UpdatehealthdataAction_patient.php" method="POST">
        <label for="sleep">Sleeping Hours : </label>
        <input type="number" id="sleep" name="sleep" min="0" max="14"> <strong>hour(s)</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_sleep'])){
                echo $_SESSION['msg_sleep'];
                unset($_SESSION['msg_sleep']);
            }
        ?>
        <br>

        <label for="bp">Blood Pressure : </label>
        <input type="number" id="bp" name="bph"> <strong>/</strong> <input type="number" id="bp" name="bpl"> <strong>mmHg</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_bp'])){
                echo $_SESSION['msg_bp'];
                unset($_SESSION['msg_bp']);
            }
        ?>
        <br>

        <label for="heartrate">Heart Rate : </label>
        <input type="number" id="heartrate" name="heartrate"> <strong>bpm</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_heartrate'])){
                echo $_SESSION['msg_heartrate'];
                unset($_SESSION['msg_heartrate']);
            }
        ?>
        <br>

        <label for="water">Drinking Water : </label>
        <input type="water" id="water" name="water"> <strong>litre(s)</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_dwater'])){
                echo $_SESSION['msg_dwater'];
                unset($_SESSION['msg_dwater']);
            }
        ?>
        <br>

        <label for="exercise">Exercise Data : </label>
        <input type="number" id="exercise" name="exercise"> <strong>hour(s)</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_exercise'])){
                echo $_SESSION['msg_exercise'];
                unset($_SESSION['msg_exercise']);
            }
        ?>
        <br>

        <label for="height">Height : </label>
        <input type="number" name="height" id="height"> <strong>mitre(s)</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_height'])){
                echo $_SESSION['msg_height'];
                unset($_SESSION['msg_height']);
            }
        ?>
        <br>

        <label for="weight">Weight : </label>
        <input type="number" name="weight" id="weight"> <strong>kg(s)</strong>
        <br>
        <?php
            if(isset($_SESSION['msg_weight'])){
                echo $_SESSION['msg_weight'];
                unset($_SESSION['msg_weight']);
            }
        ?>
        <br>
        <input type="submit" value="Update">
    </form>
    
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>