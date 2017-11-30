<!DOCTYPE html>
<?php

require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
$login = new Login();
if($login->isLogged()) //if user already logged in
		$login->redirect("http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20project/index.php"); //redirect to the home page

 ?>
<html>
<head>
	<title>Log in </title>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/login_handler.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index_style.css">
	<link rel="stylesheet" type="text/css" href="../css/login_style.css">

</head>
<body>
	<ul>
		<li><b class = "navigationb">Hello World</b></li>
	    <li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/Views/signup.php'>Signup</a></li>
    	<li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/Views/crime_post.php'>Post Crime</a></li>
    	<li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/index.php'>Home</a></li>
    </ul>
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
			<tr><td><input type="text" id = "username_email" name="username_email" placeholder="username or email id" onkeyup="isAnyFieldEmpty()"></td></tr>
			<tr><td><input type="Password" id = "password" name="password" placeholder = "password" onkeyup="isAnyFieldEmpty()"></td></tr>
			<tr><td align = "center"><input type="submit" id = "button" name="login" value = "login"></td></tr>
			<tr><td align = "center"><a id = "signup_link" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/Views/signup.php" target="">Don't have an account yet?</a></td></tr>
			<tr><td align = "center"><span id="emptyField_error" style="color:red;"></span></td></tr>
		</table>
	</form>
</div>
</body>
</html>
