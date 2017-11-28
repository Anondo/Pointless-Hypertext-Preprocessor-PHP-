<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
$admin_login = new AdminController();
if($admin_login->isLogged()) //if user already logged in
		$admin_login->redirect("http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20projectadmin/index.php"); //redirect to the home page

 ?>
<html>
<head>
	<title>Login Page For Admins</title>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/login_handler.js"></script>
</head>
<body>
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
				<td>Username or Email</td>
				<td>:</td>
				<td><input id = "username_email" type = "text" name = "unameOremail"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input id = "password" type = "password" name = "pass" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="submitButton" value = "LOGIN"/></td>
			</tr>
		</table>

	</form>

</body>
</html>
