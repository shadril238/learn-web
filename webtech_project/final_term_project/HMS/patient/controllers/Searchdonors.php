<?php 
	
    require "../models/ViewblooddonorsDB_patient.php";
	require 'Validation.php';

	if ($_SERVER["REQUEST_METHOD"] === "GET") {

		$key = sanitize($_GET['name']);
		//var_dump($key);
		$res=searchdonors($key);
		//var_dump(mysqli_fetch_assoc($res));
		
		$tmp = array();
		while($row = mysqli_fetch_assoc($res)) {
			echo"
                <tr>
                    <td>".$row['d_name']."</td>
                    <td>".$row['d_bg']."</td>
                    <td>".$row['d_gen']."</td>
                    <td>".$row['d_age']."</td>
                    <td>".$row['d_loc']."</td>
                    <td>".$row['d_phn']."</td>
                </tr>
                ";
		}
	
	}
?>