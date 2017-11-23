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



}



 ?>
