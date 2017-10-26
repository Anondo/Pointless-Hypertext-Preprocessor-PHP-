<?php

$file = $_FILES["picture"];
$filename = $file["name"];
$file_tmp = $file["tmp_name"];
$directory = "uploads/";

move_uploaded_file($file_tmp , $directory.$filename);
echo "<h1>Uploaded</h1>";





 ?>
