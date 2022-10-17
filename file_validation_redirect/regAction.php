<?php  
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (empty($_POST['fname']) || empty($_POST['lname']) || !isset($_POST['gender']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['cpass'])) {
            header("Location:registration.php?msg=Please fill up the form properly");
        }
        else {
            echo $_POST['fname'] . "<br>" . $_POST['lname']. "<br>" . $_POST['gender'] . "<br>" . $_POST['email'] . "<br>" . $_POST['pass']. "<br>" . $_POST['cpass'];
        }	
    }
    else {
        /*echo "Invalid Request";*/
        
    }
?>