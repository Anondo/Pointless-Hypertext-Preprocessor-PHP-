<?php

class Login{
    private $logged = false;
    private $redirect_address = "";
    private $username = "";
    private $userid = 0;
    function Login()
    {
        session_start();
        if(isset($_SESSION['logged_in']))
        {
        	$this->logged = $_SESSION["logged_in"];
        	$this->username = $_SESSION["username"];
            $this->userid = $_SESSION["user_id"];
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
        return $this->username;
    }
    function getUserid()
    {
        return $this->userid;
    }
    function log_in($username , $userid , $location = "#")
    {
        $_SESSION["logged_in"] = true; //creating a bool type session variable which should indicate whether user logged in or not
        /*username and user_id is taken as well for ease of use in other pages*/
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $userid;
        header("Location: $location");
    }


}




 ?>
