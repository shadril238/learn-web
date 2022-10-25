<?php
	
	$f = fopen("data.json", "w");

	$text = array("name" => "kawsur", "language" => "PHP");

	fwrite($f, json_encode($text));

	/*$t = fread($f, filesize("data.json"));

	$t2 = json_decode($t);

	echo $t2->name;*/
?> 
