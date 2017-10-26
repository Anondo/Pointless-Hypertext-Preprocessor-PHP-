<?php

//an associative array is an array which is indexed bny strings and the elements are stored in key => value pairs
$capital = array("Bangladesh" => "Dhaka" , "England" => "London" , "Spain" => "madrid"); //the str before the => operator is key and the latter is value
foreach($capital as $key=>$value)
{
    echo "<p>The capital of $key is $value</p>";
}
$capital["USA"] = "New York";
foreach($capital as $key=>$value)
{
    echo "<p>The capital of $key is $value</p>";
}

 ?>
