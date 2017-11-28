<?php


session_start();
if(isset($_SESSION["logged_in"]))//if the user is logged in
{
    if($_SESSION["logged_in"])
    {
        session_destroy(); //this is function destroys the whole temporary session file thus logging out the user
    }
}
header("Location: http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20project/index.php");


 ?>
