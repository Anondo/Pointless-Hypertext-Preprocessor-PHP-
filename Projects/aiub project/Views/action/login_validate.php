<?php


require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
$login = new Login();;
if(isset($_POST["username_email"]) && isset($_POST["password"]))
{
    $username_or_email = $_POST["username_email"];
    $password = $_POST["password"];
    if($login->isUserValid($username_or_email , $password , "username") ||$login->isUserValid($username_or_email , $password , "email"))
    {
        $row = $login->getQueryResult();
        $login->log_in($row["username"] , $row["user_id"] , " http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20project/index.php" , $row["role"] , $row["pro_pic"]);
    }
    else
    {
        echo "<h1><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20project/Views/login.php'>Invalid User</a></h1>";
    }
}




 ?>
