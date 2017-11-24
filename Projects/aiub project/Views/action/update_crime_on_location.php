<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
$location = new LocationController();
$loc_name = "";
if(isset($_GET["loc_name"]))
{
    $loc_name = $_GET["loc_name"];
}
$success = $location->updateCrimeCount($loc_name);
if($success)
    echo "ok";
else
    echo "not ok";



 ?>
