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
    <title>Update Pharmacist Profile</title>
</head>
<body>
    <h1>Update Pharmacist Details</h1>
    <?php
        $index=$_GET['idx'];
        $_SESSION['idx']=$index;
        $filename="../../models/pharmacist_data.json";
        $data=file_get_contents($filename);
        $data= json_decode($data,true);
    ?>
    <form action="../../controllers/admin/UpdatepharmacistAction_admin.php" method="POST" novalidate>
        <label for="fname">First Name : </label>
        <input type="text" id="fname" name="fname" value="<?php echo $data[$index]['fname']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_fname'])){
                echo $_SESSION['msg_fname'];
                unset($_SESSION['msg_fname']);
            }
        ?>
        <br>

        <label for="lname">Last Name : </label>
        <input type="text" id="lname" name="lname" value="<?php echo $data[$index]['lname']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_lname'])){
                echo $_SESSION['msg_lname'];
                unset($_SESSION['msg_lname']);
            }
        ?>
        <br>
<label for="dob">Date of Birth : </label>
        <input type="date" id="dob" name="dob" value=<?php echo $data[$index]['dob']?>>
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

        <label for="bg">Blood Group : </label>
        <select name="blood_group" id="bg">
            <option value="">Select here</option>
            <option value="A+" <?php echo ($data[$index]['blood_group']==="A+")?"selected":"" ?>>A(+ve)</option>
            <option value="A-" <?php echo ($data[$index]['blood_group']==="A-")?"selected":"" ?>>A(-ve)</option>
            <option value="B+" <?php echo ($data[$index]['blood_group']==="B+")?"selected":"" ?>>B(+ve)</option>
            <option value="B-" <?php echo ($data[$index]['blood_group']==="B-")?"selected":"" ?>>B(-ve)</option>
            <option value="O+" <?php echo ($data[$index]['blood_group']==="O+")?"selected":"" ?>>O(+ve)</option>
            <option value="O-" <?php echo ($data[$index]['blood_group']==="O-")?"selected":"" ?>>O(-ve)</option>
            <option value="AB+" <?php echo ($data[$index]['blood_group']==="AB+")?"selected":"" ?>>AB(+ve)</option>
            <option value="AB-" <?php echo ($data[$index]['blood_group']==="AB-")?"selected":"" ?>>AB(-ve)</option>
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
        <input type="text" id="eduqual" name="eduqual" value="<?php echo $data[$index]['eduqual']?>">
        <br>
        <?php
            if(isset($_SESSION['msg_eduqual'])){
                echo $_SESSION['msg_eduqual'];
                unset($_SESSION['msg_eduqual']);
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
</html


