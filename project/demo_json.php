<?php
$strJsonFileContents = file_get_contents("rohit.json");
$ar=json_decode($strJsonFileContents,true);
echo "<pre>";
        print_r($ar);
   echo "</pre>";
?>
