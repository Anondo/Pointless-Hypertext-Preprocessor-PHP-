<?php

$filename = "my_write_file.txt";
$file = fopen($filename , "w");

if($file == false)
{
    echo "<h3>Couldn't Locate The File!!</h3>";
}
else
{
    $text = fwrite($file , "This is a dumb text");
    fclose($file);
    $file = fopen($filename , "r");
    $filesize = filesize($filename);
    $text = fread($file , $filesize);
    echo "<h3>The Content Of The File:</h3>";
    echo "<p>$text</p>";
    fclose($file);
}



 ?>
