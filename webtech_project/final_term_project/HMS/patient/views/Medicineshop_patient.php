
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Table Border Style-->
    <style> 
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/Medshop.js"></script>
    <script src="js/Medsearch.js"></script>

</head>
<body>
    <h1>Medicine Shop</h1>
    <br>
    <?php
        if(isset($_SESSION['msg_global'])){
            echo $_SESSION['msg_global'];
            unset($_SESSION['msg_global']);
        }
    ?>
    <br>
    <form action="../controllers/Searchmed.php" method="GET" onsubmit="return search(this);">
    <div class="inp">
        <input type="search" name="name">
        <button type="submit">Search</button>
    </div> 
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tabledata1">
            <?php
                require "../models/MedicineshopDB_patient.php";
                $result=viewMedicine();
                if($result->num_rows>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                            <form class='frm' action='../controllers/MedicineshopAction_patient.php' method='POST' novalidate onsubmit='return medShop(this);'>
                            <tr>
                                <td>".$row['pname']."</td>
                                <td>".$row['unitprice']."</td>
                                <td> <input type='number' name='qty' class='qty' value=1> </td>
                                <input type='hidden' name='id' value=".$row['pid'].">
                                <input type='hidden' name='name' value=".$row['pname'].">
                                <input type='hidden' name='price' value=".$row['unitprice'].">
                                <td>  <button type='submit'>Add to Cart</button></td>       
                            </tr>
                            </form>
                            ";             
                    }
                }

            ?>
        </tbody>
    </table>
    <span id="global_msg" style="color:red"></span>
    <?php
        if(isset($_SESSION['global_msg'])){
            echo $_SESSION['global_msg'];
            unset($_SESSION['global_msg']);
        }
    ?>
</body>
</html>