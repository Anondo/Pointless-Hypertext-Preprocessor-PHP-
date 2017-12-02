<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
$admin_login = new AdminController();
if($admin_login->isLogged()) //if user already logged in
		$admin_login->redirect("http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20projectadmin/index.php"); //redirect to the home page

?>
<html>
<head>
	<title>Login Page For Admins</title>
	<link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/navigation.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/login_style.css">
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
<div>
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
