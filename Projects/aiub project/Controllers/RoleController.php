<?php

require(get_include_path()."\Projects\aiub project\Models\RoleModel.php");
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
