<?php
    function updateProfile($p_fname, $p_lname, $p_phn, $p_dob, $p_gender, $p_bloodgroup, $p_address, $p_district, $p_division, $p_postal){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "UPDATE patient_data SET p_fname=?, p_lname=?, p_phn=?, p_dob=?, p_gender=?, p_bloodgroup=?, p_address=?, p_district=?, p_division=?, p_postal=? WHERE p_email = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssssss",$p_fname, $p_lname, $p_phn, $p_dob, $p_gender, $p_bloodgroup, $p_address, $p_district, $p_division, $p_postal, $_SESSION["email"]);
        $res=mysqli_stmt_execute($stmt);
        mysqli_close($conn);

        return $res;
    }
?>