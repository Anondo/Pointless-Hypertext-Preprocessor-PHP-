<?php

require(__DIR__."\..\Controllers\CriminalController.php");
$criminal_control = new CriminalController();
$un = $_GET["username"];


$ok = $criminal_control->criminalExists($un);
if($ok)
{
    echo "not";
}
else
{
    echo "exists";
}




 ?>
