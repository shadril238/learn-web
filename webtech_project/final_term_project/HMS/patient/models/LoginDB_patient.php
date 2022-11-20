<?php

    $conn = mysqli_connect("localhost", "root", "", "hms");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT p_email, p_pass FROM patient_data WHERE p_email = ? and p_pass = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $p_email, $p_pass);
    mysqli_stmt_fetch($stmt);
    echo $p_email . $p_pass;
?>