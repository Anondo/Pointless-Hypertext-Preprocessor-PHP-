<?php

require_once(__DIR__."\..\Controllers\AdminController.php");
$admin_login = new AdminController();
if($admin_login->isLogged()) //if user already logged in
		$admin_login->redirect("http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20projectadmin/index.php"); //redirect to the home page

?>
<html>
<head>
	<title>Login Page For Admins</title>
	<link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/login_style.css">
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/login_handler.js"></script>

</head>
<body>

	<ul>
			<?php
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

<div align="center">
	<?php
	if(isset($_GET["logreq"]))
	{
		if($_GET["logreq"] == 1)
			echo "<p style='color:red;'>You Need To Log in First</p>";
		unset($_GET["logreq"]);
	}
	 ?>
	<form action = "admin_login_validate.php" method = "POST" onsubmit="return isAnyFieldEmpty()">
		<table>
			<tr>
				<td><input id = "username_email" type = "text" name = "unameOremail" placeholder="username or email id"/></td>
			</tr>
			<tr>
				<td><input id = "Password" type = "password" name = "pass" placeholder = "password"/></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" id="button" name="submitButton" value = "LOGIN"/></td>
			</tr>
		</table>

	</form>
</div>
</body>
</html>
