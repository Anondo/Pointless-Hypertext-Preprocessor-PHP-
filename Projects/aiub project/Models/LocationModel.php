<?php

require_once("Models.php");

class LocationModel extends Models{
    function LocationModel()
    {
        Models::Models();
    }
    function getLocNames()
    {
        $loc = array();
        $result = $this->executeQuery("select loc_name from location;");
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $loc[] = $row["loc_name"];
            }
        }
        return $loc;
    }
    function updateCrimeCount($loc_name)
    {
        $success = $this->executeDMLQuery("update location set crimes = crimes + 1 where loc_name = '$loc_name'");
        return $success;
    }
    function getCrimeZoneNumber()
    {
        $number = $this->executeQuery("select count(loc_id) from location where crimes > 0");
        $number = $number->fetch_assoc();
        $number = $number["count(loc_id)"];
        return $number;
    }
    function getLocationsJSON()
    {
        $result = $this->executeQuery("select * from location where crimes > 0");
        $places = array();
        while($row = $result->fetch_assoc())
        {
            $places[] = $row;
        }
        $json_places = json_encode($places);
        return $json_places;
    }



}



 ?>
