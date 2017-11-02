<?php
session_start(); //the pages which are going to use the shared variables must start the session..
//this function accesses an existing session and if there is none..starts one new
print_r($GLOBALS);
echo "<br />";
if(isset($_SESSION["name"]) && isset($_SESSION["alter_ego"]))
{
    echo "Hi {$_SESSION['name']} please turn into {$_SESSION["alter_ego"]}";
}


 ?>
