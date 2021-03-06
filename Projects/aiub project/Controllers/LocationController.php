<?php

require(__DIR__."\..\Models\LocationModel.php");

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
    function numberOfCrimeZones()
    {
        return $this->location->getCrimeZoneNumber();
    }
    function getJSONLocations()
    {
        return $this->location->getLocationsJSON();
    }
}



 ?>
