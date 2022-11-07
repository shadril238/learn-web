<?php
    include "Header_doctor.php";
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
    <title>View Doctor Profile</title>
</head>
<body>
    <h1>View Doctor Profile</h1>
    <table>
        <tbody>
            <tr>
                <td><img src=<?php echo $_SESSION['photo']?> alt="Doctor Profile Photo" width="42" height="42" style="vertical-align:middle"></td>               
            </tr>
            <tr>
                <td>Name : </td>
                <td><strong><?php echo $_SESSION['name'] ?></strong></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><strong><?php echo $_SESSION['email'] ?></strong></td>
            </tr>
            <tr>
                <td>Date of Birth : </td>
                <td><strong><?php echo $_SESSION['dob'] ?></strong></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td><strong><?php echo $_SESSION['gender'] ?></strong></td>
            </tr>
            <tr>
                <td>Degree : </td>
                <td><strong><?php echo $_SESSION['degree'] ?></strong></td>
            </tr>
            <tr>
                <td>Department : </td>
                <td><strong><?php echo $_SESSION['department'] ?></strong></td>
            </tr>
            <tr>
                <td>Phone no : </td>
                <td><strong><?php echo $_SESSION['phone'] ?></strong></td>
            </tr>
        </tbody>
    </table>
    <?php
        include "Footer_doctor.php";
    ?>
</body>
</html>