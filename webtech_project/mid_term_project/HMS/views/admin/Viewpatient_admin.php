<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['admin_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: Login_admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Table Border Style-->
    <style> 
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient- Admin</title>
</head>
<body>
    <h1>Blood Patient - Admin</h1>
    <?php
        $filename="../../models/patient_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
            <tr>
                <th>Patient's First Name</th>
                <th>Patient's Last Name</th>
                <th>Patient's Email</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>District</th>
                <th>Division</th>
                <th>Postal Code</th>
                <th>Contact No</th>
                <th>Action</th>
            </tr>
            <?php
                $index=0;
                foreach($data as $read_data){
                    echo "
                        <tr>
                            <td>".$read_data->fname."</td>
                            <td>".$read_data->lname."</td>
                            <td>".$read_data->email."</td>
                            <td>".$read_data->gender."</td>
                            <td>".$read_data->dob."</td>
                            <td>".$read_data->blood_group."</td>
                            <td>".$read_data->address."</td>
                            <td>".$read_data->district."</td>
                            <td>".$read_data->division."</td>
                            <td>".$read_data->postal_code."</td>
                            <td>".$read_data->phone."</td>
                            <td>
                                <a href='Updatepatient_admin.php?idx=".$index."'>Update</a>
                                <a href='../../controllers/admin/Deletepatient_admin.php?idx=".$index."'>Delete</a>
                            </td>
                        </tr>
                        ";
                    $index++;
                }
            ?>
        </tbody>
    </table>


</body>
</html>