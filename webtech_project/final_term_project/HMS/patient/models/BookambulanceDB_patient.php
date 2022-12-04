<?php
    //checking pending request
    function checkPending(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM ambulance_data WHERE p_email=? AND status=?";
        mysqli_stmt_prepare($stmt, $sql);
        $status="pending";
        mysqli_stmt_bind_param($stmt, "ss",$_SESSION['email'], $status);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        return $result->num_rows === 1;
    }

    //book ambulance
    function bookAmbulance($loc, $dis, $div, $postal, $date, $time, $status){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO ambulance_data (p_email, ploc, pdis, pdiv, ppostal, pdate, ptime, status) VALUES (?,?,?,?,?,?,?,?)";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss",$_SESSION['email'], $loc, $dis, $div, $postal, $date, $time, $status);
        $res=mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return $res;
    }

    //booking history
    function history(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);

        $sql= "SELECT * FROM ambulance_data WHERE p_email=?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s",$_SESSION['email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        //var_dump($result);
        return $result;
    }

?>