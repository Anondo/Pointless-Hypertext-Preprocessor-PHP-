<?php

require("Models/Models.php");
$database = new Models();
$message = "";
$un = $_GET["username"];


$user = $database->executeQuery("select * from users where username = '$un'");
if(!is_object($user))
{
    echo "not";
}
else
{
    echo "exists";
}




 ?>
