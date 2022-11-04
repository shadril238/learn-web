<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacist Signup</title>
</head>
<body>
    <h1>Pharmacist Signup</h1>
    <form method="post" enctype="multipart/form-data" action="../../controllers/pharmacist/SignupAction_pharmacist.php" novalidate>
        <label for="fname">First Name : </label>
        <input type="text" id="fname" name="fname">
        <br>
        <?php
            if(isset($_SESSION['msg_fname'])){
                echo $_SESSION['msg_fname'];
                unset($_SESSION['msg_fname']);
            }
        ?>
        <br>

        <label for="lname">Last Name : </label>
        <input type="text" id="lname" name="lname">
        <br>
        <?php
            if(isset($_SESSION['msg_lname'])){
                echo $_SESSION['msg_lname'];
                unset($_SESSION['msg_lname']);
            }
        ?>
        <br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="">
        <br>
        <?php
            if(isset($_SESSION['msg_email'])){
                echo $_SESSION['msg_email'];
                unset($_SESSION['msg_email']);
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

        <label for="dob">Date of Birth : </label>
        <input type="date" id="dob" name="dob">
        <br>
        <?php
            if(isset($_SESSION['msg_dob'])){
                echo $_SESSION['msg_dob'];
                unset($_SESSION['msg_dob']);

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
        <label for="eduqual">Educational Qualification : </label>
        <input type="text" id="eduqual" name="eduqual">
        <br>
        <?php
            if(isset($_SESSION['msg_eduqual'])){
                echo $_SESSION['msg_eduqual'];
                unset($_SESSION['msg_eduqual']);
            }
        ?>
        <br>

        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" id="photo">
        <br>
        <?php 
            if(isset($_SESSION['msg_photo'])){
                echo $_SESSION['msg_photo'];
                unset($_SESSION['msg_photo']);
            }
        ?>
        <br>


        <label for="pass">Password : </label>
        <input type="password" id="pass" name="password">
        <br>
        <?php
            if(isset($_SESSION['msg_pass'])){
                echo $_SESSION['msg_pass'];
                unset($_SESSION['msg_pass']);
            }
        ?>
        <br>

        <label for="cpass">Confirm Password : </label>
        <input type="password" id="cpass" name="confirm_password">
        <br>
        <?php
            if(isset($_SESSION['msg_cpass'])){
                echo $_SESSION['msg_cpass'];
                unset($_SESSION['msg_cpass']);
            }
        ?>
        <br>

        <input type="submit" value="Signup">
    </form>
    
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>