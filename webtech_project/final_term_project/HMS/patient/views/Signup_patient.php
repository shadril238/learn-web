<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Signup</title>
    <link rel="stylesheet" type="text/css" href="css/SignupStyle.css">
    <script src="js/Signup.js"></script>
</head>
<body>
    <div class="main">
        <div class="logo">
            <img src="../models/hms_logo.png" alt="HMS Logo">
        </div>
        <h3>Patient Signup</h3>
        <form method="post" enctype="multipart/form-data" action="../controllers/SignupAction_patient.php" novalidate onsubmit="return isValid(this);">
            <div class="row">
                <div class="column1">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="">
                    <br>
                    <span id="fname_msg" style="color:red"></span>
                    <?php
                        if(isset($_SESSION['msg_fname'])){
                            echo $_SESSION['msg_fname'];
                            unset($_SESSION['msg_fname']);
                        }
                    ?>
                    <br>
                </div>
                
                <div class="column2">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname">
                    <br>
                    <span id="lname_msg" style="color:red"></span>
                    <?php
                        if(isset($_SESSION['msg_lname'])){
                            echo $_SESSION['msg_lname'];
                            unset($_SESSION['msg_lname']);
                        }
                    ?>
                    <br>
                </div>
                
                <div class="mail">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="">
                    <br>
                    <span id="email_msg" style="color:red"></span>
                    <?php
                        if(isset($_SESSION['msg_email'])){
                            echo $_SESSION['msg_email'];
                            unset($_SESSION['msg_email']);
                        }
                    ?>
                    <br>
                </div>
                
                <div class="column1">
                    <label for="phn">Contract No</label>
                    <input type="text" name="phn" id="phn">
                    <br>
                    <span id="phn_msg" style="color:red"></span>
                    <?php
                        if(isset($_SESSION['msg_phn'])){
                            echo $_SESSION['msg_phn'];
                            unset($_SESSION['msg_phn']);
                        }
                    ?>
                    <br>
                </div>
                
                <div class="column2">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob">
                    <br>
                    <span id="dob_msg" style="color:red"></span>
                    <?php
                        if(isset($_SESSION['msg_dob'])){
                            echo $_SESSION['msg_dob'];
                            unset($_SESSION['msg_dob']);

                        }
                    ?>
                    <br>
                </div>
                
                <div class="column2">
                    <label for="gender">Gender</label>
                    <div class="gen">
                        <input type="radio" id="male" name="gender" value="male" >
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" >
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other" >
                        <label for="other">Other</label>
                        <br>
                        <br>   
                        <span id="gender_msg" style="color:red"></span>
                        <?php
                            if(isset($_SESSION['msg_gender'])){
                                echo $_SESSION['msg_gender'];
                                unset($_SESSION['msg_gender']);
                            }
                        ?>
                        <br>
                    </div>
                </div>
                
                <div class="column1">
                <label for="bg">Blood Group</label>
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
                <span id="bg_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_bg'])){
                        echo $_SESSION['msg_bg'];
                        unset($_SESSION['msg_bg']);
                    }
                ?>
                <br>
                </div>

                <div class="addr1">
                    <label for="addr">Address Line 1</label>
                    <textarea id="addr" name="address" cols="20" rows="1"></textarea>
                    <br>
                    <span id="addr_msg" style="color:red"></span>
                    <?php
                        if(isset($_SESSION['msg_addr'])){
                            echo $_SESSION['msg_addr'];
                            unset($_SESSION['msg_addr']);
                        }
                    ?>
                    <br>
                </div>

                <div class="column1">
                <label for="dis">District</label>
                <select name="district" id="dis">
                    <option value="">Select here</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Faridpur">Faridpur</option>
                    <option value="Gazipur">Gazipur</option>
                    <option value="Gopalganj">Gopalganj</option>
                    <option value="Jamalpur">Jamalpur</option>
                </select>
                <br>
                <span id="dis_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_dis'])){
                        echo $_SESSION['msg_dis'];
                        unset($_SESSION['msg_dis']);
                    }
                ?>
                <br>
                </div>
                
                <div class="column2">
                <label for="div">Division</label>
                <select name="division" id="div">
                    <option value="">Select here</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Barishal">Barishal</option>
                    <option value="Chattogram">Chattogram</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Sylhet">Sylhet</option>
                </select>
                <br>
                <span id="div_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_div'])){
                        echo $_SESSION['msg_div'];
                        unset($_SESSION['msg_div']);
                    }
                ?>
                <br>
                </div>
                
                <div class="column1">
                <label for="pcode">Postal Code</label>
                <input type="text" id="pcode" name="postal_code">
                <br>
                <span id="pcode_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_postal'])){
                        echo $_SESSION['msg_postal'];
                        unset($_SESSION['msg_postal']);
                    }
                ?>
                <br>
                </div>

                <div class="column2">
                <label for="photo">Upload Photo</label>
                <input type="file" name="photo" id="photo">
                <br>
                <span id="photo_msg" style="color:red"></span>
                <?php 
                    if(isset($_SESSION['msg_photo'])){
                        echo $_SESSION['msg_photo'];
                        unset($_SESSION['msg_photo']);
                    }
                ?>
                <br>
                </div>

                <div class="column1">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="password">
                <br>
                <span id="pass_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_pass'])){
                        echo $_SESSION['msg_pass'];
                        unset($_SESSION['msg_pass']);
                    }
                ?>
                <br>
                </div>

                <div class="column2">
                <label for="cpass">Confirm Password</label>
                <input type="password" id="cpass" name="confirm_password">
                <br>
                <span id="cpass_msg" style="color:red"></span>
                <?php
                    if(isset($_SESSION['msg_cpass'])){
                        echo $_SESSION['msg_cpass'];
                        unset($_SESSION['msg_cpass']);
                    }
                ?>
                <br>
                </div>
            </div>

            <button type="submit">Sign Up</button>
        </form>
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