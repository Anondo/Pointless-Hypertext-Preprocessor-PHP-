<?php

require(__DIR__."\..\Models\RoleModel.php");
class RoleController{
    private $role = NULL;
    function RoleController()
    {
        $this->role = new RoleModel();
    }
    function getAllRoles()
    {
        return $this->role->getAllRoles();
    }
}


 ?>
