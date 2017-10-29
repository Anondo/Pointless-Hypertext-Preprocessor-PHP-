<?php


session_start();
if(isset($_SESSION["logged_in"]))
{
    if($_SESSION["logged_in"])
    {
        session_destroy();
    }
}
header("Location: index.php");


 ?>
