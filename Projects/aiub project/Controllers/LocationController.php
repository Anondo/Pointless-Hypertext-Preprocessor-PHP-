<?php

require(get_include_path()."\Projects\aiub project\Models\LocationModel.php");

class LocationController{
    private $location;
    function LocationController()
    {
        $this->location = new LocationModel();
    }
    function getLocations()
    {
        return $this->location->getLocNames();
    }
    function updateCrimeCount($location)
    {
        return $this->location->updateCrimeCount($location);
    }
}



 ?>
