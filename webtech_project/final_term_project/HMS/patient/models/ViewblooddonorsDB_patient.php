<?php
    $conn = mysqli_connect("localhost", "root", "", "hms");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM donor_data WHERE d_bg = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['blood_group']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    //var_dump($result);
    
?>