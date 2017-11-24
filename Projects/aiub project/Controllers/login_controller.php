<?php

require(get_include_path()."\Projects\aiub project\Models\UserModel.php");
class Login{
    private $logged = false;
    private $redirect_address = "";
    private $user = NULL;
    private $queryResult = NULL;
    function Login()
    {
        session_start();
        $this->user = new UserModel();
        if(isset($_SESSION['logged_in']))
        {
        	$this->logged = $_SESSION["logged_in"];
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
    function log_in($username , $userid , $location = "#")
    {
        $_SESSION["logged_in"] = true; //creating a bool type session variable which should indicate whether user logged in or not
        /*username and user_id is taken as well for ease of use in other pages*/
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $userid;
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
