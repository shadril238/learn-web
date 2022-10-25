<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $filename = "data.json";
        $data=file_get_contents($filename);
        $data= json_decode($data);
        //print_r($read_data2);
        //echo $read_data2->firstname;
        //echo $read_data2->firstname ." ". $read_data2->lastname;
    ?>
        <table>
        <tbody>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th> </th>
                <th> </th>
            </tr>
    <?php
        $index=0;
        foreach($data as $rd){
            $fname=$rd->firstname;
            $lname=$rd->lastname;
            echo "
                <tr>
                    <td>".$fname."</td>
                    <td>".$lname."</td>
                    <td>
                        <a href='Update_Form.php?idx=".$index."'>Edit</a>
                        <a href='DeleteAction.php?idx=".$index."'>Delete</a>
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