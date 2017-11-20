<!DOCTYPE html>
<?php

require("E:\PHP\Projects\aiub project\Controllers\login_controller.php");
$login = new Login();
if($login->isLogged()) //if user already logged in
		$login->redirect("http://localhost/Projects/aiub%20project/index.php"); //redirect to the home page

 ?>
<html>
<head>
	<title>Log in </title>
	<script src = "http://localhost/Projects/aiub%20project/js/login_handler.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/login_style.css">
</head>
<body>

<div>
	<?php

	if(isset($_GET["logreq"]))
	{
		if($_GET["logreq"])
			echo "<h3 style = 'color:red;'>You Need To Login First</h3>";
	}

	 ?>
	<form  action="action/login_validate.php" method="POST" onsubmit = "return isAnyFieldEmpty()">
		<table>
			<tr><td><input type="text" id = "username_email" name="username_email" placeholder="username or email id" ></td></tr>
			<tr><td><input type="Password" id = "password" name="password" placeholder = "password"></td></tr>
			<tr><td align = "center"><input type="submit" id = "button" name="login" value = "login"></td></tr>
			<tr><td align = "center"><a href="http://localhost/Projects/aiub%20project/Views/signup.php" target="">Don't have an account yet?</a></td></tr>
		</table>
	</form>
</div>
</body>
</html>
