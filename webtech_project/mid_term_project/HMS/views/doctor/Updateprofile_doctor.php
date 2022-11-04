<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['doctor_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_doctor.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor Profile</title>
</head>
<body>
    <h1>Update Doctor Profile</h1>
    <img src=<?php echo $_SESSION['photo']?> alt="Profile Picture" width="50" height="50" style="vertical-align:middle">
    <form action="../../controllers/doctor/UpdateprofileAction_doctor.php" method="POST" enctype="multipart/form-data" novalidate>

        <label for="name">Name : </label>
        <input type="text" id="name" name="name" value="<?php echo (isset($_SESSION['name'])?$_SESSION['name']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_name'])){
                echo $_SESSION['msg_name'];
                unset($_SESSION['msg_name']);
            }
        ?>
        <br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="<?php echo (isset($_SESSION['email'])?$_SESSION['email']:"")?>" disabled>
        <br>
        <?php
            if(isset($_SESSION['msg_email'])){
                echo $_SESSION['msg_email'];
                unset($_SESSION['msg_email']);
            }
        ?>
        <br>

        <label for="phn">Phone no : </label>
        <input type="text" name="phn" id="phn" value="<?php echo (isset($_SESSION['phone'])?$_SESSION['phone']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_phn'])){
                echo $_SESSION['msg_phn'];
                unset($_SESSION['msg_phn']);
            }
        ?>
        <br>

        <label for="dob">Date of Birth : </label>
        <input type="date" id="dob" name="dob" value="<?php echo (isset($_SESSION['dob'])?$_SESSION['dob']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_dob'])){
                echo $_SESSION['msg_dob'];
                unset($_SESSION['msg_dob']);

            }
        ?>
        <br>

        <label for="gender">Gender : </label>
        <input type="radio" id="male" name="gender" value="male" <?php echo ($_SESSION['gender']==="male")?"checked":"" ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php echo ($_SESSION['gender']==="female")?"checked":"" ?>>
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other" <?php echo ($_SESSION['gender']==="other")?"checked":"" ?>>
        <label for="other">Other</label>
        <br>
        <?php
            if(isset($_SESSION['msg_gender'])){
                echo $_SESSION['msg_gender'];
                unset($_SESSION['msg_gender']);
            }
        ?>
        <br>

        <label for="degree">Degree : </label>
        <input type="text" name="degree" id="degree" value="<?php echo (isset($_SESSION['degree'])?$_SESSION['degree']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_degree'])){
                echo $_SESSION['msg_degree'];
                unset($_SESSION['msg_degree']);
            }
        ?>
        <br>

        <label for="dept">Department : </label>
        <input type="text" name="dept" id="dept" value="<?php echo (isset($_SESSION['department'])?$_SESSION['department']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_dept'])){
                echo $_SESSION['msg_dept'];
                unset($_SESSION['msg_dept']);
            }
        ?>
        <br>

        <input type="submit" value="Update Profile">
    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>