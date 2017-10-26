<?php

require("Models.php");

$database = new Models();
$message = "";

session_start();

if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["age"]) && isset($_POST["uname"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["cpass"]) && isset($_POST["gender"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $gender = $_POST["gender"];
    $_SESSION["signup_data"] = $_POST;
    if(passwordValidate($pass , $cpass) && usernameValidate($uname) && ageValidate($age))
    {
        echo "<h>You Have Succesfully Signed UP!!!</h>";
        session_destroy();
    }
    else
    {
        echo "<h><a href = SignUP.php>$message</a></h>";
    }

}


function passwordValidate($p , $cp)
{
    global $message;
    if(strlen($p) < 8)
    {
        $message = "Password length must of at least more than 8 characters!";
        return false;
    }
    if($p != $cp)
    {
        $message = "The Passwords Did Not Match";
        return false;
    }
    $hasSpChar = false;
    $hasDigit = false;
    $sp_chars = array("%" , "_" , "!" , "$" , "@" , "#");
    $digits = array("0" , "1" , "2" , "3" , "4" , "5" , "6" , "7" , "8" , "9");
    foreach($sp_chars as $v)
    {
        if(strpos($p , $v))
        {
            $hasSpChar = true;
            break;
        }
    }
    foreach($digits as $v)
    {
        if(strpos($p , $v))
        {
            $hasDigit = true;
            break;
        }
    }
    if($hasDigit && $hasSpChar)
    {
        return true;
    }
    else
    {
        $message = "Atleast (% , _ , ! , $ , @ , #) one of these characters must be present in the password!";
        return false;
    }

}
function usernameValidate($un)
{
    global $database;
    global $message;
    $user = $database->executeQuery("select * from users where username = '$un'");
    if(!is_object($user))
    {
        return true;
    }
    else
    {
        $message = "Username already taken";
        return false;
    }
}
function ageValidate($a)
{
    global $message;
    if($a <= 0)
    {
        $message = "You age says that you dont exist";
        return false;
    }

}




 ?>
