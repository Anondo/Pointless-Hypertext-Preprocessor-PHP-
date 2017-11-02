<?php

session_start(); //this function creates a temporary file in the xampp folder and an array called $_SESSION to store variable
//that can be shared among different php pages until the session is destroyed or the browser is closed
$name = "Jason Blood";
$alter_ego = "Etrigan";
/* assigning the variables */
$_SESSION["name"] = $name;
$_SESSION["alter_ego"] = $alter_ego;
print_r($GLOBALS); 
?>
