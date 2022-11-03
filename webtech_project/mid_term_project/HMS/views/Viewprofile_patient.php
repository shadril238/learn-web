<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['patient_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../views/Login_patient.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Profile</title>
</head>
<body>
    <h1>View Patient Profile</h1>
    <table>
        <tbody>
            <tr>
                <td><img src=<?php echo $_SESSION['photo']?> alt="Patient Profile Photo" width="42" height="42" style="vertical-align:middle"></td>               
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
</body>
</html>