<?php
    //all data
    function appointmentData(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM doc_appointment WHERE status=?";
        mysqli_stmt_prepare($stmt, $sql);
        $status="available";
        mysqli_stmt_bind_param($stmt, "s", $status);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        //var_dump($result);
        return $result;
    }

    //book appointment
    function bookAppointment($id){
        $status="booked";
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "UPDATE doc_appointment SET p_email=?, p_name=?, status=? WHERE d_id=?";
        mysqli_stmt_prepare($stmt, $sql);
        $name=$_SESSION['fname']." ".$_SESSION['lname'];
        mysqli_stmt_bind_param($stmt, "sssi",$_SESSION['email'],$name,$status,$id);
        $res=mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return $res;
    }
    
    //history
    function history(){
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM doc_appointment WHERE status=? AND p_email=?";
        mysqli_stmt_prepare($stmt, $sql);
        $status="booked";
        mysqli_stmt_bind_param($stmt, "ss", $status,$_SESSION['email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_close($conn);
        //var_dump($result);
        return $result;
    }
    
?>