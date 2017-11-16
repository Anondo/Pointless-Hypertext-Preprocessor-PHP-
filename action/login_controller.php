<?php

session_start();
class Login{
    private $logged = false;
    private $redirect_address = "";
    private $username = "";
    private $userid = 0;
    function Login()
    {
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


}




 ?>
