<?php

require_once("Models.php");
class RoleModel extends Models{
    function RoleModel()
    {
        Models::Models();
    }
    function getAllRoles()
    {
        $result = $this->executeQuery("select * from user_role");
        return $result;
    }
}



 ?>
