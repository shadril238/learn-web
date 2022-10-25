<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Signup Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Signup</h1>
        <form method="post" action="SignupAction.php" novalidate>
            
            <label for="email">Email : </label>
            <input type="email" name="email" id="email" value="">
            <br>
            <?php
                if(isset($_GET['msg_email'])){
                    echo $_GET['msg_email'];
                }
            ?>
            <br>
            
            <label for="pass">Password : </label>
            <input type="password" id="pass" name="password">
            <br>
            <?php
                if(isset($_GET['msg_pass'])){
                    echo $_GET['msg_pass'];
                }
            ?>
            <br>
            
            <label for="cpass">Confirm Password : </label>
            <input type="password" id="cpass" name="confirm_password">
            <br>
            <?php
                if(isset($_GET['msg_cpass'])){
                    echo $_GET['msg_cpass'];
                }
            ?>
            <br>

            <input type="submit" value="Signup">
        </form>
    </body>
</html>