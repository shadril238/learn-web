<?php  
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (empty($_POST['fname']) || empty($_POST['lname']) || !isset($_POST['picture']) || empty($_POST['addr']) || !isset($_POST['district']) || !isset($_POST['division']) || empty($_POST['pcode']) || !isset($_POST['country'])) {
            header("Location:profile.php?msg=Please fill up the form properly");
        }
        else {
            echo $_POST['fname'] . "<br>" . $_POST['lname']. "<br>". $_POST['picture'] . "<br>" .$_POST['addr'] . "<br>" . $_POST['district']. "<br>" . $_POST['division']. "<br>" . $_POST['pcode']. "<br>" . $_POST['country'];
        }	
    }
    else {
        /*echo "Invalid Request";*/
        
    }
?>