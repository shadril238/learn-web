<?php

	function viewMedicine(){
		$conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM product_data";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        //var_dump($result);
        return $result;
	}

    // function searchMed($name){
    //     $conn = mysqli_connect("localhost", "root", "", "hms");
    //     if (!$conn) {
    //         die("Connection failed: " . mysqli_connect_error());
    //     }
    //     $stmt = mysqli_stmt_init($conn);
    //     $sql = "SELECT * FROM product_data WHERE pname LIKE ? ";
    //     mysqli_stmt_prepare($stmt, $sql);
    //     $name = "%" . $name . "%";
    //     mysqli_stmt_bind_param($stmt, "s", $name);
    //     mysqli_stmt_execute($stmt);

    //     $result = mysqli_stmt_get_result($stmt);
    //     mysqli_close($conn);

    //     return $result;


    // }

?>