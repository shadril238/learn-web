<?php
    session_start();
    if(!isset($_SESSION["email"]) and !isset($_SESSION["user_idx"])){
        header("Location: Login.php");
        exit();
        
    }else{
        echo $_SESSION["email"]."<br>".$_SESSION["user_idx"];
    }   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Set Security Question</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Set Security Question</h1>
        <form method="post" action="SecurityQuestionAction.php" novalidate>
            <label for="security">What is your pet's name : </label>
            <br><br>
            <input type="text" name="security" id="security" value=<?php echo $_SESSION["security"]?>>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }
?>