<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
$location_control = new LocationController();
$crimeZoneNumber = $location_control->numberOfCrimeZones();
echo $crimeZoneNumber;


 ?>
