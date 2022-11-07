<?php
    include "Header_admin.php";
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
    <title>Update Doctor Profile</title>
</head>
<body>
    <h1>Update Doctor Details</h1>
    <?php
        $index=$_GET['idx'];
        $_SESSION['idx']=$index;
        $filename="../../models/doctor_data.json";
        $data=file_get_contents($filename);
        $data= json_decode($data,true);
    ?>
    <form action="../../controllers/admin/UpdatedoctorAction_admin.php" method="POST" novalidate>
        <label for="name">Name : </label>
        <input type="text" id="name" name="name" value="<?php echo $data[$index]['name']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_name'])){
                echo $_SESSION['msg_name'];
                unset($_SESSION['msg_name']);
            }
        ?>

        <br>

        <label for="phn">Phone no : </label>
        <input type="text" name="phn" id="phn" value="<?php echo $data[$index]['phone']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_phn'])){
                echo $_SESSION['msg_phn'];
                unset($_SESSION['msg_phn']);
            }
        ?>
        <br>

        <label for="dob">Date of Birth : </label>
        <input type="date" id="dob" name="dob" value="<?php echo $data[$index]['dob']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_dob'])){
                echo $_SESSION['msg_dob'];
                unset($_SESSION['msg_dob']);

            }
        ?>
        <br>

        <label for="gender">Gender : </label>
        <input type="radio" id="male" name="gender" value="male" <?php echo ($data[$index]['gender']==="male")?"checked":"" ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php echo ($data[$index]['gender']==="female")?"checked":"" ?>>
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other" <?php echo ($data[$index]['gender']==="other")?"checked":"" ?>>
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
        <input type="text" name="degree" id="degree" value="<?php echo $data[$index]['degree']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_degree'])){
                echo $_SESSION['msg_degree'];
                unset($_SESSION['msg_degree']);
            }
        ?>
        <br>

        <label for="dept">Department : </label>
        <input type="text" name="dept" id="dept" value="<?php echo $data[$index]['department']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_dept'])){
                echo $_SESSION['msg_dept'];
                unset($_SESSION['msg_dept']);
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
        include "Footer_admin.php";
    ?>
</body>
</html>

