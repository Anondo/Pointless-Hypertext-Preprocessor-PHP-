<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">
</head>
<body>

		<ul>
			<?php

				require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
				$admin_login = new AdminController();
				if($admin_login->isLogged())
				{
					echo "<li><b class = \"navigationb\">Welcome ". $admin_login->getUsername(). "</b></li>";
					echo "<li class=\"right-li\"><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/Views/action/logout.php'>Logout</a></li>";
				}
				else
				{
					echo "<li><b class = \"navigationb\">Hello World</b></li>";
					echo "<li class=\"right-li\"><a href = 'login.php'>Login</a></li>";
				}
     	    ?>
     		<li class="dropdown right-li">
     			<a href="#" class="dropbtn">Manage</a>
     			<div class="dropdown-content">
	 	            <a href = "blog.php" > Manage Blogs </a>
	 				<a href = "user.php" > Manage Users </a>
					<a href = "criminal.php" > Manage Criminals </a>
  				</div>
	 		</li>
	 	</ul>

	 	<h2>Welcome to Admin Panel.</h2>



</body>
</html>
