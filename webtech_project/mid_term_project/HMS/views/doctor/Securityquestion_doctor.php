<?php
    include "Header_patient.php";
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_doctor.php");
    }
    //echo $_SESSION['security_ques'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Security Question</title>
</head>
<body>
    <h1>Set Security Question</h1>
    <form method="post" action="../../controllers/doctor/SecurityquestionAction_doctor.php" novalidate>
        <label for="security_ques">Question : </label>
        <select name="security_ques" id="security_ques">
            <option value="" <?php echo ($_SESSION['security_ques']==="")?"selected":"" ?>>Select here </option>
            <option value="What is the last name of the teacher who gave you your first failing grade?" <?php echo ($_SESSION['security_ques']==="What is the last name of the teacher who gave you your first failing grade?")?"selected":"" ?>>What is the last name of the teacher who gave you your first failing grade?</option>
            <option value="What is your pets name?" <?php echo ($_SESSION['security_ques']==="What is your pets name?")?"selected":"" ?>>What is your pet's name?</option>
            <option value="In what year was your father born?" <?php echo ($_SESSION['security_ques']==="In what year was your father born?")?"selected":"" ?>>In what year was your father born?</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_securityQ'])){
                echo $_SESSION['msg_securityQ'];
                unset($_SESSION['msg_securityQ']);
            }
        ?>
        <br>
        <label for="security_ans">Answer : </label> 
        <input type="text" name="security_ans" id="security_ans" value="<?php echo (isset($_SESSION['security_ans'])?$_SESSION['security_ans']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_securityA'])){
                echo $_SESSION['msg_securityA'];
                unset($_SESSION['msg_securityA']);
            }
        ?>
        <br>
        <input type="submit" value="Set">
    </form>

    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>