<?php    
    //login
    function credentials($email, $password) {
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT p_id, p_email, p_pass FROM patient_data WHERE p_email = ? and p_pass = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        return $result->num_rows === 1;
    }
?>