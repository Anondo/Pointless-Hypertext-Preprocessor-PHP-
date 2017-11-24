<?php

require(get_include_path()."\Projects\aiub project\Controllers\SignupController.php");
$signup = new SignupController();
$un = $_GET["username"];


$ok = $signup->usernameExists($un);
if($ok)
{
    echo "not";
}
else
{
    echo "exists";
}




 ?>
