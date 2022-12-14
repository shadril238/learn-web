<?php 
	
    require "../models/MedicineshopDB_patient.php";
	require 'Validation.php';

	if ($_SERVER["REQUEST_METHOD"] === "GET") {

		$key = sanitize($_GET['name']);
		//var_dump($key);
		$res=searchMed($key);
		//var_dump(mysqli_fetch_assoc($res));
		
		$tmp = array();
		while($row=mysqli_fetch_assoc($res)){
        	echo "
                            <form class='frm' action='MedicineshopAction_patient.php' method='POST' novalidate onsubmit='return medShop(this);'>
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