<html>
	<head>
		<title>Admin Panel</title>
	</head>
	<body>
	<?php

		require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
		$admin_login = new AdminController();
		if($admin_login->isLogged())
		{
			echo "<h1>Welcome ". $admin_login->getUsername(). "</h1>";
			echo "<p><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/Views/action/logout.php'>Logout</a></p>";
		}
			else
		{
			echo "<h1>Hello World</h1>";
			echo "<p><a href = 'login.php'>Login</a></p>";
		}

     ?>

	 <a href = "blog.php" > Manage Blogs.. </a> <br/>
	 <a href = "user.php" > Manage Users.. </a>
	</body>
</html>
