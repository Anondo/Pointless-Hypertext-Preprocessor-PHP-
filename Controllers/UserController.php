<?php

require_once("E:\PHP\Projects\aiub project\Models\UserModel.php");
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
