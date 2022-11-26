<?php
    //set security ques & ans
    function setSecurity($p_sq, $p_sa){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "UPDATE patient_data SET p_sq=?, p_sa=? WHERE p_email = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss",$p_sq, $p_sa, $_SESSION["email"]);
        $res=mysqli_stmt_execute($stmt);
        mysqli_close($conn);

        return $res;
    }
    //retrieve security ques (not using this function-> using session based auth)
    function retrieveSecurityQ(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT  ? FROM patient_data WHERE p_email = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$p_sq, $_SESSION["email"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $p_sq);
        mysqli_stmt_fetch($stmt);
        mysqli_close($conn);
        return $p_sq;
    }
    //retrieve security ans (not using this-> using session based auth)
    function retrieveSecurityA(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT  ? FROM patient_data WHERE p_email = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$p_sa, $_SESSION["email"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $p_sa);
        mysqli_stmt_fetch($stmt);
        mysqli_close($conn);
        return $p_sa;
    }
?>