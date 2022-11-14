<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>
</head>
<body>
    <a href="index.php">Home</a> <a href="setConversionrate.php">Conversion Rate</a> <a href="history.php">History</a>

    <h1>Converter</h1>
    <form action="ConvertAction.php" method="POST" novalidate>
        <label for="cat">Select Category : </label>
        <select name="cat" id="cat">
            <option value="USD_to_BDT" <?php echo (isset($_SESSION['cat']) and $_SESSION['cat']==="USD_to_BDT")?"selected":"" ?>>USD_to_BDT</option>
            <option value="CAD_to_BDT" <?php echo (isset($_SESSION['cat']) and $_SESSION['cat']==="CAD_to_BDT")?"selected":"" ?>>CAD_to_BDT</option>
            <option value="INCH_to_FEET" <?php echo (isset($_SESSION['cat']) and $_SESSION['cat']==="INCH_to_FEET")?"selected":"" ?>>INCH_to_FEET</option>
        </select>
        <br><br>
        <label for="val">Value : </label>
        <input type="number" name="val" id="val" value=<?php echo (isset($_SESSION['val'])?$_SESSION['val']:"")?>>
        <br><br>
        <label for="res">Result : </label>
        <input type="text" name="res" id="res" value=<?php echo (isset($_SESSION['res'])?$_SESSION['res']:"")?>>
        <br><br>
        <input type="submit" value="Convert">
    </form>

    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>