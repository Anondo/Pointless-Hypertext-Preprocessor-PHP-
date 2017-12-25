<?php

require(__DIR__."\..\..\Controllers\UserController.php");

if(isset($_GET["key"]) && isset($_GET["value"]))
{
    $key = $_GET["key"];
    $value = $_GET["value"];
    $user_control = new UserController();
    $json_users = $user_control->getUsersBy($key , $value);
    echo $json_users;

}



 ?>
