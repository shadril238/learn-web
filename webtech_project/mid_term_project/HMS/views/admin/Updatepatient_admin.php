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
    <title>Update Patient Profile</title>
</head>
<body>
    <h1>Update Patient Details</h1>
    <?php
        $index=$_GET['idx'];
        $_SESSION['idx']=$index;
        $filename="../../models/patient_data.json";
        $data=file_get_contents($filename);
        $data= json_decode($data,true);
    ?>
    <form action="../../controllers/admin/UpdatepatientAction_admin.php" method="POST" novalidate>
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

        <label for="addr">Address Line 1 : </label>
        <textarea id="addr" name="address" cols="20" rows="1" ><?php echo $data[$index]['address']?></textarea>
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
            <option value="Dhaka"  <?php echo ($data[$index]['district']==="Dhaka")?"selected":"" ?>>Dhaka</option>
            <option value="Faridpur" <?php echo ($data[$index]['district']==="Faridpur")?"selected":"" ?>>Faridpur</option>
            <option value="Gazipur" <?php echo ($data[$index]['district']==="Gazipur")?"selected":"" ?>>Gazipur</option>
            <option value="Gopalganj" <?php echo ($data[$index]['district']==="Gopalganj")?"selected":"" ?>>Gopalganj</option>
            <option value="Jamalpur" <?php echo ($data[$index]['district']==="Jamalpur")?"selected":"" ?>>Jamalpur</option>
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
            <option value="Dhaka" <?php echo ($data[$index]['district']==="Dhaka")?"selected":"" ?>>Dhaka</option>
            <option value="Barishal" <?php echo ($data[$index]['district']==="Barishal")?"selected":"" ?>>Barishal</option>
            <option value="Chattogram" <?php echo ($data[$index]['district']==="Chattogram")?"selected":"" ?>>Chattogram</option>
            <option value="Khulna" <?php echo ($data[$index]['district']==="Khulna")?"selected":"" ?>>Khulna</option>
            <option value="Rajshahi" <?php echo ($data[$index]['district']==="Rajshahi")?"selected":"" ?>>Rajshahi</option>
            <option value="Rangpur" <?php echo ($data[$index]['district']==="Rangpur")?"selected":"" ?>>Rangpur</option>
            <option value="Mymensingh" <?php echo ($data[$index]['district']==="Mymensingh")?"selected":"" ?>>Mymensingh</option>
            <option value="Sylhet" <?php echo ($data[$index]['district']==="Sylhet")?"selected":"" ?>>Sylhet</option>
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
        <input type="text" id="pcode" name="postal_code" value=<?php echo $data[$index]['postal_code']?>>
        <br>
        <?php
            if(isset($_SESSION['msg_postal'])){
                echo $_SESSION['msg_postal'];
                unset($_SESSION['msg_postal']);
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


