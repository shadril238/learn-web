<?php
    session_start();
    if(!isset($_SESSION['email']) and !isset($_SESSION['admin_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Admin Profile</title>
</head>
<body>
    <h1>View Admin Profile</h1>
    <img src=<?php echo $_SESSION['photo']?> alt="Smiley face" width="42" height="42" style="vertical-align:middle">
    <form method="post" enctype="multipart/form-data" action="../../controllers/admin/ViewprofileAction_admin.php" novalidate>
    
        <label for="fname">First Name : </label>
        <input type="text" id="fname" name="fname" value="<?php echo (isset($_SESSION['fname'])?$_SESSION['fname']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_fname'])){
                echo $_SESSION['msg_fname'];
                unset($_SESSION['msg_fname']);
            }
        ?>
        <br>

        <label for="lname">Last Name : </label>
        <input type="text" id="lname" name="lname" value="<?php echo (isset($_SESSION['lname'])?$_SESSION['lname']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_lname'])){
                echo $_SESSION['msg_lname'];
                unset($_SESSION['msg_lname']);
            }
        ?>
        <br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="<?php echo (isset($_SESSION['email'])?$_SESSION['email']:"")?>">
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
        <input type="date" id="dob" name="dob" value=<?php echo (isset($_SESSION['dob'])?$_SESSION['dob']:"")?>>
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

        <label for="bg">Blood Group : </label>
        <select name="blood_group" id="bg">
            <option value="">Select here</option>
            <option value="A+" <?php echo ($_SESSION['blood_group']==="A+")?"selected":"" ?>>A(+ve)</option>
            <option value="A-" <?php echo ($_SESSION['blood_group']==="A-")?"selected":"" ?>>A(-ve)</option>
            <option value="B+" <?php echo ($_SESSION['blood_group']==="B+")?"selected":"" ?>>B(+ve)</option>
            <option value="B-" <?php echo ($_SESSION['blood_group']==="B-")?"selected":"" ?>>B(-ve)</option>
            <option value="O+" <?php echo ($_SESSION['blood_group']==="O+")?"selected":"" ?>>O(+ve)</option>
            <option value="O-" <?php echo ($_SESSION['blood_group']==="O-")?"selected":"" ?>>O(-ve)</option>
            <option value="AB+" <?php echo ($_SESSION['blood_group']==="AB+")?"selected":"" ?>>AB(+ve)</option>
            <option value="AB-" <?php echo ($_SESSION['blood_group']==="AB-")?"selected":"" ?>>AB(-ve)</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_bg'])){
                echo $_SESSION['msg_bg'];
                unset($_SESSION['msg_bg']);
            }
        ?>
        <br>

        <label for="addr">Address Line 1 : </label>
        <textarea id="addr" name="address" cols="20" rows="1" ><?php echo (isset($_SESSION['address'])?$_SESSION['address']:"") ?></textarea>
        <br>
        <?php
            if(isset($_SESSION['msg_addr'])){
                echo $_SESSION['msg_addr'];
                unset($_SESSION['msg_addr']);
            }
        ?>
        <br>

        <label for="dis">District : </label>
        <select name="district" id="dis">
            <option value="">Select here</option>
            <option value="Dhaka"  <?php echo ($_SESSION['district']==="Dhaka")?"selected":"" ?>>Dhaka</option>
            <option value="Faridpur" <?php echo ($_SESSION['district']==="Faridpur")?"selected":"" ?>>Faridpur</option>
            <option value="Gazipur" <?php echo ($_SESSION['district']==="Gazipur")?"selected":"" ?>>Gazipur</option>
            <option value="Gopalganj" <?php echo ($_SESSION['district']==="Gopalganj")?"selected":"" ?>>Gopalganj</option>
            <option value="Jamalpur" <?php echo ($_SESSION['district']==="Jamalpur")?"selected":"" ?>>Jamalpur</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_dis'])){
                echo $_SESSION['msg_dis'];
                unset($_SESSION['msg_dis']);
            }
        ?>
        <br>

        <label for="div">Division : </label>
        <select name="division" id="div">
            <option value="">Select here</option>
            <option value="Dhaka" <?php echo ($_SESSION['division']==="Dhaka")?"selected":"" ?>>Dhaka</option>
            <option value="Barishal" <?php echo ($_SESSION['division']==="Barishal")?"selected":"" ?>>Barishal</option>
            <option value="Chattogram" <?php echo ($_SESSION['division']==="Chattogram")?"selected":"" ?>>Chattogram</option>
            <option value="Khulna" <?php echo ($_SESSION['division']==="Khulna")?"selected":"" ?>>Khulna</option>
            <option value="Rajshahi" <?php echo ($_SESSION['division']==="Rajshahi")?"selected":"" ?>>Rajshahi</option>
            <option value="Rangpur" <?php echo ($_SESSION['division']==="Rangpur")?"selected":"" ?>>Rangpur</option>
            <option value="Mymensingh" <?php echo ($_SESSION['division']==="Mymensingh")?"selected":"" ?>>Mymensingh</option>
            <option value="Sylhet" <?php echo ($_SESSION['division']==="Sylhet")?"selected":"" ?>>Sylhet</option>
        </select>
        <br>
        <?php
            if(isset($_SESSION['msg_div'])){
                echo $_SESSION['msg_div'];
                unset($_SESSION['msg_div']);
            }
        ?>
        <br>

        <label for="pcode">Postal Code : </label>
        <input type="text" id="pcode" name="postal_code" value="<?php echo (isset($_SESSION['postal_code'])?$_SESSION['postal_code']:"")?>">
        <br>
        <?php
            if(isset($_SESSION['msg_postal'])){
                echo $_SESSION['msg_postal'];
                unset($_SESSION['msg_postal']);
            }
        ?>
        <br>

    </form>
    
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>