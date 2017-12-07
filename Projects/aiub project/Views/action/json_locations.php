<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
$location_control = new LocationController();
$crimeZones= $location_control->getJSONLocations();
echo $crimeZones;



 ?>
