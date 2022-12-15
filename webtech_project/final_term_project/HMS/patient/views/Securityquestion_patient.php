
<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_patient.php");
    }
    include "Header.php";
    //echo $_SESSION['security_ques'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Security Question</title>
    <script src="js/Securitydetails.js"></script>
    <link rel="stylesheet" type="text/css" href="css/SecurityquesStyle.css">

</head>
<body>
    <h3>Set Security Question</h3>
    <div class="main">
    
    <form method="post" action="../controllers/SecurityquestionAction_patient.php" novalidate onsubmit="return isValid(this);">
        <div class="inp">
        <label for="security_ques">Question </label>
        <select name="security_ques" id="security_ques">
            <option value="" <?php echo ($_SESSION['security_ques']==="")?"selected":"" ?>>Select here </option>
            <option value="What is the last name of the teacher who gave you your first failing grade?" <?php echo ($_SESSION['security_ques']==="What is the last name of the teacher who gave you your first failing grade?")?"selected":"" ?>>What is the last name of the teacher who gave you your first failing grade?</option>
            <option value="What is your pets name?" <?php echo ($_SESSION['security_ques']==="What is your pets name?")?"selected":"" ?>>What is your pet's name?</option>
            <option value="In what year was your father born?" <?php echo ($_SESSION['security_ques']==="In what year was your father born?")?"selected":"" ?>>In what year was your father born?</option>
        </select>
        <br>
        <span id="ques_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_securityQ'])){
                echo $_SESSION['msg_securityQ'];
                unset($_SESSION['msg_securityQ']);
            }
        ?>
        <br>
        <label for="security_ans">Answer </label> 
        <input type="text" name="security_ans" id="security_ans" value="<?php echo (isset($_SESSION['security_ans'])?$_SESSION['security_ans']:"")?>">
        <br>
        <span id="ans_msg" style="color:red"></span>
        <?php
            if(isset($_SESSION['msg_securityA'])){
                echo $_SESSION['msg_securityA'];
                unset($_SESSION['msg_securityA']);
            }
        ?>
        <br>
        <button type="submit">Submit</button>
    </div>
    </form>
    
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
    </div>
</body>
</html>