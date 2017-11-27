<?php

	require(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
    $admin_login = new AdminController();
    if($admin_login->isLogged())
    {
        echo "<h1>Welcome ". $admin_login->getUsername(). "</h1>";
        echo "<p><a href = 'http://localhost/Projects/aiub project/Views/action/logout.php'>Logout</a></p>";
    }
    else
    {
        echo "<h1>Hello World</h1>";
        echo "<p><a href = 'login.php'>Login</a></p>";
    }

?>
