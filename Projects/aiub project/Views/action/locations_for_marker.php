<?php

require_once(__DIR__."\..\..\Controllers\LocationController.php");
$location_control = new LocationController();
$crimeZoneNumber = $location_control->numberOfCrimeZones();
echo $crimeZoneNumber;


 ?>
