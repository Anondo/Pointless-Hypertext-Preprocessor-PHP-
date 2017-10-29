<?php

session_start();
$logged = false;
$username = NULL;
if(isset($_SESSION["logged_in"]))
{
    $logged = $_SESSION["logged_in"];
    $username = $_SESSION["username"];
}
if($logged)
{
    echo "<h1>Welcome $username</h1>";
}
else
{
    echo "<h1>Hello World</h1>";
}
//session_destroy();


 ?>
