<?php
    $conn = mysqli_connect("localhost", "root", "", "hms");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT p_fname, p_lname, p_phn, p_dob, p_gender, p_bloodgroup, p_address, p_district, p_division, p_postal, p_photo, p_sq, p_sa FROM patient_data WHERE p_email = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $p_fname, $p_lname, $p_phn, $p_dob, $p_gender, $p_bloodgroup, $p_address, $p_district, $p_division, $p_postal, $p_photo,$p_sq, $p_sa);
    mysqli_stmt_fetch($stmt);
    mysqli_close($conn);
?>