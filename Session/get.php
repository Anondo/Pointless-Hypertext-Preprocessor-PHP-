<?php
session_start(); //the pages which are going to use the shared variables must start the session..
//this function accesses a existing session and if there is none..starts one new
print_r($GLOBALS);
echo "<br />";
if(isset($_SESSION["name"]) && isset($_SESSION["alter_ego"]))
{
    echo "Hi {$_SESSION['name']} you are now {$_SESSION["alter_ego"]} years old";
}


 ?>
