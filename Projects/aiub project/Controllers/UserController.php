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
    function getUser($id)
    {
        return $this->user->getUser($id);
    }
    function getRoleName($role)
	{
		return $this->user->getRoleName($role);
	}
    function updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic)
    {
        return $this->user->updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role ,$pro_pic);
    }
    function deleteUser($id)
    {
        return $this->user->deleteUser($id);
    }
}







 ?>
