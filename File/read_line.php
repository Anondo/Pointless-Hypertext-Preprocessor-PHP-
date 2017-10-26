<?php

$file = fopen("myfile.txt" , "r");
echo "<h2>The contents of the file:</h2>";
while(!feof($file))
{
    $line = fgets($file);
    echo "<p>$line</p>";
}


 ?>
