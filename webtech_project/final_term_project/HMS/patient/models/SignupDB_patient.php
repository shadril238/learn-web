<?php
    //checking if the email is unique
    function isUniqueEmail($email){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT p_id, p_email FROM patient_data WHERE p_email = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        return $result->num_rows === 0;
    }
    // signup patient
    function signupPatient($p_email, $p_pass, $p_fname, $p_lname, $p_phn, $p_dob, $p_gender, $p_bloodgroup, $p_address, $p_district, $p_division, $p_postal, $p_photo){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO patient_data (p_email, p_pass, p_fname, p_lname, p_phn, p_dob, p_gender, p_bloodgroup, p_address, p_district, p_division, p_postal, p_photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssssssss",$p_email, $p_pass, $p_fname, $p_lname, $p_phn, $p_dob, $p_gender, $p_bloodgroup, $p_address, $p_district, $p_division, $p_postal,$p_photo);
        $res=mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return $res;
    }
?>