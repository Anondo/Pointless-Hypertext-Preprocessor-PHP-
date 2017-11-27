<?php

require(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
$admin_login = new AdminController();
if($admin_login->isLogged()) //if user already logged in
		$admin_login->redirect("http://localhost/Projects/aiub%20project/Views/admin/admin_panel.php"); //redirect to the home page

 ?>
<html>
<head>
	<title>Login Page For Admins</title>
</head>
<body>

	<form action = "admin_login_validate.php" method = "POST">
		<table>
			<tr>
				<td>Username or Email</td>
				<td>:</td>
				<td><input type = "text" name = "unameOremail"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type = "password" name = "pass" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="submitButton" value = "LOGIN"/></td>
			</tr>
		</table>
		
	</form>

</body>
</html>