<!DOCTYPE html>
<?php

session_start();
if(isset($_SESSION["logged_in"])) //if the user is already logged in
{
	if($_SESSION["logged_in"])
		header("Location: http://localhost/Projects/aiub%20project/index.php"); //redirect to the home page
}
 ?>
<html>
<head>
	<title>Log in </title>
	<link rel="stylesheet" type="text/css" href="../css/login_style.css">
</head>
<body>

<div>
	<form  action="login_validate.php" method="POST" >
		<table>
			<tr><td><input type="text" id = "username_email" name="username_email" placeholder="username or email id" ></td></tr>
			<tr><td><input type="Password" id = "password" name="password" placeholder = "password"></td></tr>
			<tr><td align = "center"><input type="submit" id = "button" name="login" value = "login"></td></tr>
			<tr><td align = "center"><a href="http://localhost/Projects/aiub%20project/templates/signup.html" target="">Don't have an account yet?</a></td></tr>
		</table>
	</form>
</div>
</body>
</html>
