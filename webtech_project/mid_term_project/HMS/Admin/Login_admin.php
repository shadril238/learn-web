<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form method="post" action="LoginAction_admin.php" novalidate>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="need php validation[1]">

        <br>
        <?php
            if(isset($_GET['msg_email'])){
                echo $_GET['msg_email'];
            }
        ?>
        <br>

        <label for="password">Password : </label>
        <input type="password" name="password" id="password" value="need php validation[2]">

        <br>
        <?php
            if(isset($_GET['msg_pass'])){
                echo $_GET['msg_pass'];
            }
        ?>
        <br>

        <input type="submit" value="Login">
    </form>

    <?php
        if(isset($_GET['msg'])){
            echo $_GET['msg'];
        }
    ?>
    
</body>
</html>