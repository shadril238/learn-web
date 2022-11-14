<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cat=sanitize($_POST['cat']);
        $val=sanitize($_POST['val']);
        $isValid=true;
        $rate="";

        if(empty($val)){
            $_SESSION['global_msg']="Please enter the value properly!";
            $isValid=false;
        }

        if($isValid){
            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, "webtech", 3306);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql="Select rate from convertion_rate where cat='".$cat."'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $rate=$row['rate'];
                }
            }
            $res=$val*$rate;
            $_SESSION['cat']=$cat;
            $_SESSION['val']=$val;
            $_SESSION['res']=$res;


            $sql = "INSERT INTO convertion(cat,rate,val,res) VALUES ('".$cat."', '".$rate."','".$val."','".$res."')";
            $res = mysqli_query($conn, $sql);
              
            if ($res) {
                  echo "New record inserted successfully";
                  header("Location: index.php");
            }
            else {
                  echo "Error occurred " . $sql . " " . mysqli_error($conn);
            }
              
              mysqli_close($conn);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

        }else{
            header("Location: index.php");
        }
    }else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: index.php");
    }


    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
