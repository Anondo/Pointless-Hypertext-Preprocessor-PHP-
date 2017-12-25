<?php

require_once(__DIR__."\..\..\Controllers\LocationController.php");
$location_control = new LocationController();
$crimeZones= $location_control->getJSONLocations();
echo $crimeZones;



 ?>
