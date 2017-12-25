<?php

require_once(__DIR__."\..\Models\UserModel.php");
class Login{
    protected $logged = false;
    protected $redirect_address = "";
    protected $user = NULL;
    protected $queryResult = NULL;
    protected $role = 0;
    function Login()
    {
        session_start();
        $this->user = new UserModel();
        if(isset($_SESSION['logged_in']))
        {
        	$this->logged = $_SESSION["logged_in"];
            $this->role = $_SESSION["role"];
            $this->user->setUsername($_SESSION["username"]);
            $this->user->setUserId($_SESSION["user_id"]);
        }
    }
    function isLogged()
    {
        return $this->logged;
    }
    function redirect($address)
    {
        header("Location: $address");
    }
    function getUsername()
    {
        return $this->user->getUsername();
    }
    function getUserid()
    {
        return $this->user->getUserId();
    }
    function log_in($username , $userid , $location = "#" , $role = 2 , $pro_pic)
    {
        $_SESSION["logged_in"] = true; //creating a bool type session variable which should indicate whether user logged in or not
        /*username and user_id is taken as well for ease of use in other pages*/
        $_SESSION["role"] = $role;
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $userid;
        $_SESSION["pro_pic"] = $pro_pic;
        setcookie("pro_pic" , $pro_pic , time() + 1000000);
        header("Location: $location");
    }
    function isUserValid($uname_or_email , $pass , $key) //key determines whether the user provided email or username while logging in(both can be used to log in)
    {
        $this->queryResult = $this->user->validUser($uname_or_email , $pass , $key);
        if($this->queryResult)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function getQueryResult()
    {
        return $this->queryResult;
    }


}




 ?>
