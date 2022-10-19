<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Signuph</title>
</head>
<body>
    <h1>Patient Signup</h1>
    <form method="post" action="SignupAction_patient.php" novalidate>
    
        <label for="fname">First Name : </label>
        <input type="text" id="fname" name="fname">
        <br>
        <?php
            if(isset($_GET['msg_fname'])){
                echo $_GET['msg_fname'];
            }
        ?>
        <br>

        <label for="lname">Last Name : </label>
        <input type="text" id="lname" name="lname">
        <br>
        <?php
            if(isset($_GET['msg_lname'])){
                echo $_GET['msg_lname'];
            }
        ?>
        <br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="">
        <br>
        <?php
            if(isset($_GET['msg_email'])){
                echo $_GET['msg_email'];
            }
        ?>
        <br>

        <label for="phn">Phone no : </label>
        <input type="text" name="phn" id="phn">
        <br>
        <?php
            if(isset($_GET['msg_phn'])){
                echo $_GET['msg_phn'];
            }
        ?>
        <br>

        <label for="dob">Date of Birth : </label>
        <input type="date" id="dob" name="dob">
        <br>
        <?php
            if(isset($_GET['msg_dob'])){
                echo $_GET['msg_dob'];
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
            if(isset($_GET['msg_gender'])){
                echo $_GET['msg_gender'];
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
            if(isset($_GET['msg_bg'])){
                echo $_GET['msg_bg'];
            }
        ?>
        <br>

        <label for="addr">Address Line 1 : </label>
        <textarea id="addr" name="address" cols="20" rows="1"></textarea>
        <br>
        <?php
            if(isset($_GET['msg_addr'])){
                echo $_GET['msg_addr'];
            }
        ?>
        <br>

        <label for="dis">District : </label>
        <select name="district" id="dis">
            <option value="">Select here</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Faridpur">Faridpur</option>
            <option value="Gazipur">Gazipur</option>
            <option value="Gopalganj">Gopalganj</option>
            <option value="Jamalpur">Jamalpur</option>
            <option value="Kishoreganj">Kishoreganj</option>
            <option value="Madaripur">Madaripur</option>
            <option value="Manikganj">Manikganj</option>
            <option value="Munshiganj">Munshiganj</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Narayanganj">Narayanganj</option>
            <option value="Narsingdi">Narsingdi</option>
            <option value="Netrokona">Netrokona</option>
            <option value="Rajbari">Rajbari</option>
            <option value="Shariatpur">Shariatpur</option>
            <option value="Sherpur">Sherpur</option>
            <option value="Tangail">Tangail</option>
            <option value="Bogra">Bogra</option>
            <option value="Joypurhat">Joypurhat</option>
            <option value="Naogaon">Naogaon</option>
            <option value="Natore">Natore</option>
            <option value="Nawabganj">Nawabganj</option>
            <option value="Pabna">Pabna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Sirajgonj">Sirajgonj</option>
            <option value="Dinajpur">Dinajpur</option>
            <option value="Gaibandha">Gaibandha</option>
            <option value="Kurigram">Kurigram</option>
            <option value="Lalmonirhat">Lalmonirhat</option>
            <option value="Nilphamari">Nilphamari</option>
            <option value="Panchagarh">Panchagarh</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Thakurgaon">Thakurgaon</option>
            <option value="Barguna">Barguna</option>
            <option value="Barisal">Barisal</option>
            <option value="Bhola">Bhola</option>
            <option value="Jhalokati">Jhalokati</option>
            <option value="Patuakhali">Patuakhali</option>
            <option value="Pirojpur">Pirojpur</option>
            <option value="Bandarban">Bandarban</option>
            <option value="Brahmanbaria">Brahmanbaria</option>
            <option value="Chandpur">Chandpur</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Comilla">Comilla</option>
            <option value="Cox's Bazar">Cox's Bazar</option>
            <option value="Feni">Feni</option>
            <option value="Khagrachari">Khagrachari</option>
            <option value="Lakshmipur">Lakshmipur</option>
            <option value="Noakhali">Noakhali</option>
            <option value="Rangamati">Rangamati</option>
            <option value="Habiganj">Habiganj</option>
            <option value="Maulvibazar">Maulvibazar</option>
            <option value="Sunamganj">Sunamganj</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Bagerhat">Bagerhat</option>
            <option value="Chuadanga">Chuadanga</option>
            <option value="Jessore">Jessore</option>
            <option value="Jhenaidah">Jhenaidah</option>
            <option value="Khulna">Khulna</option>
            <option value="Kushtia">Kushtia</option>
            <option value="Magura">Magura</option>
            <option value="Meherpur">Meherpur</option>
            <option value="Narail">Narail</option>
            <option value="Satkhira">Satkhira</option>
        </select>
        <br>
        <?php
            if(isset($_GET['msg_dis'])){
                echo $_GET['msg_dis'];
            }
        ?>
        <br>

        <label for="div">Division : </label>
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
        <?php
            if(isset($_GET['msg_div'])){
                echo $_GET['msg_div'];
            }
        ?>
        <br>

        <label for="pcode">Postal Code : </label>
        <input type="text" id="pcode" name="postal_code">
        <br>
        <?php
            if(isset($_GET['msg_postal'])){
                echo $_GET['msg_postal'];
            }
        ?>
        <br>

        <label for="pass">Password : </label>
        <input type="password" id="pass" name="password">
        <br>
        <?php
            if(isset($_GET['msg_pass'])){
                echo $_GET['msg_pass'];
            }
        ?>
        <br>

        <label for="cpass">Confirm Password : </label>
        <input type="password" id="cpass" name="confirm_password">
        <br>
        <?php
            if(isset($_GET['msg_cpass'])){
                echo $_GET['msg_cpass'];
            }
        ?>
        <br>

        <input type="submit" value="Signup">
    </form>
    
    <?php
        if(isset($_GET['msg'])){
            echo $_GET['msg'];
        }
    ?>
</body>
</html>