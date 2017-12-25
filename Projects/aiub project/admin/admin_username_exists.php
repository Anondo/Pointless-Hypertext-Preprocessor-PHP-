<?php

require(__DIR__."\..\Controllers\SignupController.php");
require_once(__DIR__."\..\Controllers\UserController.php");
$signup = new SignupController();
$usercontrol = new UserController();
$un = $_GET["username"];
$id = $_GET["id"];
$prev_uname = $usercontrol->getUsername($id);
$prev_uname = $prev_uname['username'];

$ok = $signup->usernameExists($un);
if($ok || ($un == $prev_uname))
{
    echo "not";
}
else
{
    echo "exists";
}




 ?>
