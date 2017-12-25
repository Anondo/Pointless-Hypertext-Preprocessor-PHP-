<?php

require_once(__DIR__."\..\Models\UserModel.php");
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
    function getEmail($id)
    {
        return $this->user->getEmail($id);
    }
    function getRoleName($role)
	{
		return $this->user->getRoleName($role);
	}
    function getProfilePicture($id)
    {
        return $this->user->getPP($id);
    }
    function updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic)
    {
        return $this->user->updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role ,$pro_pic);
    }
    function getUserId($username)
    {
        return $this->user->getUserIdByName($username);
    }
    function getUsersBy($key , $value)
    {
        return $this->user->getUsersByKeyValue($key , $value);
    }
    function deleteUser($id)
    {
        return $this->user->deleteUser($id);
    }
    function removeUser($id)
    {
        return $this->user->removeUser($id);
    }
}







 ?>
