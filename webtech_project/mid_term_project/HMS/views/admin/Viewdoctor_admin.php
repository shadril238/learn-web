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
    <title>View Doctors - Admin</title>
</head>
<body>
    <h1>View Doctors - Admin</h1>
    <?php
        $filename="../../models/doctor_data.json";
        $data=file_get_contents($filename);
        $data=json_decode($data);
    ?>
    <table>
        <tbody>
            <tr>
                <th>Doctor's Name</th>
                <th>Doctor's Email</th>
                <th>Doctor's Phone</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Degree</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
            <?php
                $index=0;
                foreach($data as $read_data){
                    echo "
                        <tr>
                            <td>".$read_data->name."</td>
                            <td>".$read_data->email."</td>
                            <td>".$read_data->phone."</td>
                            <td>".$read_data->gender."</td>
                            <td>".$read_data->dob."</td>
                            <td>".$read_data->degree."</td>
                            <td>".$read_data->department."</td>
                            <td>
                                <a href='Updatedoctor_admin.php?idx=".$index."'>Update</a>
                                <a href='../../controllers/admin/Deletedoctor_admin.php?idx=".$index."'>Delete</a>
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