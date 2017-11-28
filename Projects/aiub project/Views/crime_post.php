<!DOCTYPE html>

<html>
<head>
	<title>Post</title>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/blog_handler.js"></script>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/location_handler.js"></script>
</head>
<body >
	<p><a href = 'action/logout.php'>Logout</a></p>
    <p><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/index.php'>Home</a></p>
	<?php

	require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
	require(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
	$location = new LocationController();
	$login = new Login();
	if($login->isLogged())
	{
		echo "<h1>Welcome ".$login->getUsername(). " , share your post!</h1>";
	}
	else
	{
		$login->redirect("login.php?logreq=1");
	}


	?>
<form name = "blog_form" method = "POST" action = "action/putblog.php" enctype="multipart/form-data" onsubmit="return updateCrimeOnLocation(blog_form.location.value)">
<div>
	<table>
	<tr><td colspan="3"><input type="text" name="title" placeholder="Title"></td></tr>
	<tr>
		<td>
			Place:
			<select name ="location">
				<?php
					foreach($location->getLocations() as $loc)
					{
						echo "<option value = $loc>$loc</option>";
					}
				 ?>
			</select>
		</td>
		<td>Details(location):<input type = "text" name = "secloc" /></td>
		<td>
			Category:
			<select name ="category">
				<option value = "robbery"> Robbery </option>
				<option value = "murder"> Murder </option>
				<option value = "rape"> Rape </option>
				<option value = "hijacking"> Hijacking </option>
				<option value = "other"> Other </option>
			</select>
		</td>
	</tr>
    <tr><td colspan="3"><b> Description : </b></td></tr>
	<tr><td colspan="3"><textarea name="body" cols = "120" rows="6" placeholder=" write here ...."></textarea></td></tr>
	<tr>
		 <td><button onclick="return nothing_wrong()"> post</button></td>
		<td><input type="checkbox" name="hideme" value = "hide me"> <strong>hide me </strong></td>
		<td><input type = "file" name = "attchmnt" /></td>
    </tr>
</table>
</form>
</div>

</body>
</html>
