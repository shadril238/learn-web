<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_patient.php");
    }
    include "Header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Health Data</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/Healthdata.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Healthdata.css">
</head>
<body>
    <div class="main">
    <h3>Update Your Daily Health Data</h3>
    <form  id="frm" action="../controllers/UpdatehealthdataAction_patient.php" method="POST" novalidate onsubmit="return isValid(this);">
        <label for="sleep">Sleeping Hours</label><br>
        <input type="number" id="sleep" name="sleep" min="0" max="14" placeholder="in hour(s)">
        <br>
        <span id="sleep_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_sleep'])){
                echo $_SESSION['msg_sleep'];
                unset($_SESSION['msg_sleep']);
            }
        ?>
        <br>

        <label for="bp">Blood Pressure </label><br>
        <div>
        <div class="l"><input type="number" id="bp" name="bph" placeholder="High (mmHg)"> </div>
        <div class="r"><input type="number" id="bp2" name="bpl" placeholder="Low (mmHg)"> </div>
        <br>
        <br>
        <br>
        <span id="bp_msg" style="color:red"></span>
        </div>
        
        <?php
            if(isset($_SESSION['msg_bp'])){
                echo $_SESSION['msg_bp'];
                unset($_SESSION['msg_bp']);
            }
        ?>
        <br>

        <label for="heartrate">Heart Rate </label><br>
        <input type="number" id="heartrate" name="heartrate" placeholder="in bpm">
        <br>
        <span id="heartrate_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_heartrate'])){
                echo $_SESSION['msg_heartrate'];
                unset($_SESSION['msg_heartrate']);
            }
        ?>
        <br>

        <label for="water">Drinking Water </label><br>
        <input type="water" id="water" name="water" placeholder="in litre(s)">
        <br>
        <span id="water_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_dwater'])){
                echo $_SESSION['msg_dwater'];
                unset($_SESSION['msg_dwater']);
            }
        ?>
        <br>

        <label for="exercise">Exercise Data </label>
        <br>
        <input type="number" id="exercise" name="exercise" placeholder="in hour(s)"> 
        <br>
        <span id="exercise_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_exercise'])){
                echo $_SESSION['msg_exercise'];
                unset($_SESSION['msg_exercise']);
            }
        ?>
        <br>

        <label for="wei">Weight </label><br>
        <input type="number" name="weight" id="wei" placeholder="in kg(s)"> 
        <br>
        <span id="weight_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_weight'])){
                echo $_SESSION['msg_weight'];
                unset($_SESSION['msg_weight']);
            }
        ?>
        <br>
        <button type="submit" id="frmsubmit">Submit</button>
    </form>
    <br>
    <span id="global_msg" style="color:red"></span>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
    </div>
</body>
</html>