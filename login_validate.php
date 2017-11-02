<?php

session_start(); //session used to share logged in flag and user info between different pages
require("Models.php");
$db = new Models();
$result = NULL;
if(isset($_POST["username_email"]) && isset($_POST["password"]))
{
    $username_or_email = $_POST["username_email"];
    $password = $_POST["password"];
    if(isUserValid($username_or_email , $password , "username"))
    {
        $_SESSION["logged_in"] = true; //creating a bool type session variable which should indicate whether user logged in or not
        $row = $result->fetch_assoc();
        /* username and user_id is taken as well for ease of use in other pages */
        $_SESSION["username"] = $username_or_email;
        $_SESSION["user_id"] = $row["user_id"];
        header("Location: index.php");
    }
    elseif(isUserValid($username_or_email , $password , "email"))
    {
        $_SESSION["logged_in"] = true;
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $row['username'];
        $_SESSION["user_id"] = $row["user_id"];
        header("Location: index.php");
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
