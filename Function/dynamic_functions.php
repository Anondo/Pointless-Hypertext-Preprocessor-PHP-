<?php

function greetings($name = "No One")
{
    echo "<p>Hello $name</p>";
}

greetings();
$dynamic_greetings = "greetings";
$dynamic_greetings("Messi");

 ?>
