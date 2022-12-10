<?php
    function blooddonors(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM donor_data";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        //var_dump($result);
        mysqli_close($conn);
        return $result;
    }

    function searchdonors($name){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM donor_data WHERE d_name LIKE ? OR d_bg LIKE ?";
        mysqli_stmt_prepare($stmt, $sql);
        $name = "%" . $name . "%";
        mysqli_stmt_bind_param($stmt, "ss", $name, $name);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);

        return $result;
    }
    
?>