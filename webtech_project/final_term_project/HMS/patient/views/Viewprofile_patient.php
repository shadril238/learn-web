<?php
    session_start();
    if(!isset($_SESSION['email'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location:Login_patient.php");
    }
    include "Header.php";
    //header( "refresh:1;url=../controllers/ViewprofileAction_patient.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Profile</title>
    <link rel="stylesheet" type="text/css" href="css/Profile.css">
</head>
<body>
    <h3>Patient Profile</h3>
    <div class="main">
    <table class="profile">
        <tbody>
            <tr>
                <td><img src=<?php echo $_SESSION['photo']?> alt="Patient Profile Photo" width="100" height="100" style="vertical-align:middle"></td>               
            </tr>
            <tr>
                <td>Name : </td>
                <td><strong><?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></strong></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><strong><?php echo $_SESSION['email']?></strong></td>
            </tr>
            <tr>
                <td>Date of Birth : </td>
                <td><strong><?php echo $_SESSION['dob']?></strong></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td><strong><?php echo $_SESSION['gender']?></strong></td>
            </tr>
            <tr>
                <td>Phone no : </td>
                <td><strong><?php echo $_SESSION['phone']?></strong></td>
            </tr>
            <tr>
                <td>Blood Group : </td>
                <td><strong><?php echo $_SESSION['blood_group']?></strong></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><strong><?php echo $_SESSION['address']?></strong></td>
            </tr>
            <tr>
                <td>District : </td>
                <td><strong><?php echo $_SESSION['district']?></strong></td>
            </tr>
            <tr>
                <td>Division : </td>
                <td><strong><?php echo $_SESSION['division']?></strong></td>
            </tr>
            <tr>
                <td>Postal Code : </td>
                <td><strong><?php echo $_SESSION['postal_code']?></strong></td>
            </tr>
        </tbody>
    </table>
    </div>
</body>
<?php
    include "Footer.php";
?>
</html>
