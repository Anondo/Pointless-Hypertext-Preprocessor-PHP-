<?php

$filename = "myfile.txt";
$file = fopen($filename , "r");

if($file == false)
{
    echo "<h3>Couldn't Locate The File!!</h3>";
}
else
{
    $text = fread($file , filesize($filename));
    echo "<h3>The content of the file is:</h3>";

    echo "<p>$text</p>";

}



 ?>
