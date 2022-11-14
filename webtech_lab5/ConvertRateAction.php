<?php
    session_start();

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $cat=sanitize($_POST['cat']);
        $unit=sanitize($_POST['unit']);
        $rate=sanitize($_POST['rate']);
        $isValid=true;


        if(empty($unit)){
            $_SESSION['global_msg']="Unit can't be empty!";
            $isValid=false;
        }
        if(empty($rate)){
            $_SESSION['global_msg']="Rate can't be empty!";
            $isValid=false;
        }

        if($isValid){
            $con_rate=$rate/$unit;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($servername, $username, $password, "webtech", 3306);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "Update convertion_rate set rate='".$con_rate."' where cat='".$cat."'";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "Record updated successfully";
                header("Location: index.php");
            }
            else {
                echo "Error occurred " . $sql . " " . mysqli_error($conn);
            }
            mysqli_close($conn);

        }else{
            header("Location: setConversionrate.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: setConversionrate.php");
    }


    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>