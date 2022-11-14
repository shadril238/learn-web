<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion Rate</title>
</head>
<body>
    <a href="index.php">Home</a> <a href="setConversionrate.php">Conversion Rate</a> <a href="history.php">History</a>

    <h1>Conversion Rate</h1>
    <form action="ConvertRateAction.php" method="POST" novalidate>
    <label for="cat">Select Category : </label>
        <select name="cat" id="cat">
            <option value="USD_to_BDT" <?php echo (isset($_SESSION['cat']) and $_SESSION['cat']==="USD_to_BDT")?"selected":"" ?>>USD_to_BDT</option>
            <option value="CAD_to_BDT" <?php echo (isset($_SESSION['cat']) and $_SESSION['cat']==="CAD_to_BDT")?"selected":"" ?>>CAD_to_BDT</option>
            <option value="INCH_to_FEET" <?php echo (isset($_SESSION['cat']) and $_SESSION['cat']==="INCH_to_FEET")?"selected":"" ?>>INCH_to_FEET</option>
        </select>
        <br><br>

        <label for="unit">Unit : </label>
        <input type="number" name="unit" id="unit">
        <br><br>

        <label for="rate">Rate : </label>
        <input type="rate" name="rate" id="rate">
        <br><br>

        <input type="submit" value="Set">

    </form>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>