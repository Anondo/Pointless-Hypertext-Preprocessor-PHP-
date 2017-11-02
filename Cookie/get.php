<?php

print_r($GLOBALS);
echo "<br /><br /><br />";
if(isset($_COOKIE["name"]) && isset($_COOKIE["age"]))
{
    echo "Hi {$_COOKIE['name']} you have turned {$_COOKIE['age']} this year";
}


 ?>
