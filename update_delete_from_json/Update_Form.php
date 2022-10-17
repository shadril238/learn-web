<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Update Test Form</h1>

<?php
    $index=$_GET['idx'];
    $filename = "data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data);
    $row=$data[$index]; //acessing the selected index
    //var_dump($row);
?>
<form method="POST" action="">
    <input type="text" name="fname" placeholder="First Name" value="<?php echo $row->firstname ?>">
    <br><br>
    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row->lastname ?>">
    <br><br>
    <input type="submit" value="Update">
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $firstname = sanitize($_POST['fname']);
        $lastname = sanitize($_POST['lname']);
        if (empty($firstname) or empty($lastname)) {
            echo "Please fill up the form properly";
        }
        else {
            $filename = "data.json";
            $input = array("firstname" => $firstname, "lastname" => $lastname);
            
            $data[$index]=$input; //updating data
        
            $data=json_encode($data);
            file_put_contents($filename,$data);
            header("location:Show_All.php");
        }
    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

</body>
</html>