<?php

require(get_include_path()."\Projects\aiub project\Controllers\SignupController.php");
$signup = new SignupController();
$email = $_GET["email"];

$ok = $signup->emailExists($email);
if($ok)
{
    echo "not";
}
else
{
	
    echo "exists";
}




 ?>
