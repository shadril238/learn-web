<?php
    //update health data
    function insertData($sleep, $bph, $bpl, $heartrate, $water,$exercise,$weight){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO health_data(pemail, sleep, bph, bpl,heartrate, water,exer, weight) VALUES (?,?,?,?,?,?,?,?)";
        mysqli_stmt_prepare($stmt, $sql);
        $email=$_SESSION['email'];
        mysqli_stmt_bind_param($stmt, "siiiiiii",$email, $sleep, $bph,$bpl, $heartrate, $water, $exercise, $weight);
        $res=mysqli_stmt_execute($stmt);
        mysqli_close($conn);

        return $res;
    }
    
?>