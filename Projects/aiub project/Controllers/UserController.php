<?php

require_once(get_include_path()."\Projects\aiub project\Models\UserModel.php");
class UserController{
    private $user = NULL;
    function UserController()
    {
        $this->user = new UserModel();
    }
    function getUsername($id)
    {
        return $this->user->getUsernameById($id);
    }
}







 ?>
