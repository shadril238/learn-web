
<?php
    $index=$_GET['idx'];
    $filename = "data.json";
    $data=file_get_contents($filename);
    $data= json_decode($data);
    unset($data[$index]); 
    $data=array_values($data);
    file_put_contents($filename,json_encode($data));
    header("location:Show_All.php");
?>
