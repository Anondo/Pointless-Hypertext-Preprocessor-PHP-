<?php

session_start(); //session used to share logged in flag and user info between different pages
require("Models.php");
require("login_controller.php");
$login = new Login();
$db = new Models();
$result = NULL;
if(isset($_POST["username_email"]) && isset($_POST["password"]))
{
    $username_or_email = $_POST["username_email"];
    $password = $_POST["password"];
    if(isUserValid($username_or_email , $password , "username") || isUserValid($username_or_email , $password , "email"))
    {
        $row = $result->fetch_assoc();
        $login->log_in($row["username"] , $row["user_id"] , " http://localhost/Projects/aiub%20project/index.php");
    }
    else
    {
        echo "<h1>Invalid User</h1>";
    }
}

function isUserValid($uname_or_email , $pass , $key) //key determines whether the user provided email or username while logging in(both can be used to log in)
{
    global $db;
    global $result;
    $result = $db->executeQuery("select * from users where $key = '$uname_or_email' and password = '$pass'");
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}




 ?>
