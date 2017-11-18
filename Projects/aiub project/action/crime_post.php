<!DOCTYPE html>
<?php


require("Controllers/login_controller.php");
$login = new Login();
if($login->isLogged())
{
	echo "<h1>Welcome ".$login->getUsername(). " , share your post!</h1>";
}
else
{
	$login->redirect("Views/login.php?logreq=1");
}


?>
<html>
<head>
	<title>Post</title>
</head>

<body >
<form method = "" action = "">
<div>
	<table>
	<tr><td colspan="3"><input type="text" name="title" placeholder="Title"></td></tr>
	<tr>
		<td>
			<select id ="location">
				<option value = "Location"> Location--- </option>
				<option value = "Shymoli"> Shymoli </option>
				<option value = "Mirpur"> Mirpur </option>
				<option value = "Banani"> Banani</option>
				<option value = "Motijheel"> Motijheel </option>
				<option value = "other"> Other </option>
			</select>
		</td>
		<td><input id = "date" type="date" name="time"></td>
		<td>
			<select id ="category">
				<option value = "category"> Category--- </option>
				<option value = "robbery"> Robbery </option>
				<option value = "murder"> Murder </option>
				<option value = "rape"> Rape </option>
				<option value = "hijacking"> Hijacking </option>
				<option value = "other"> Other </option>
			</select>
		</td>
	</tr>
    <tr><td colspan="3"><b> Description : </b></td></tr>
	<tr><td colspan="3"><textarea name="description" cols = "120" rows="6" placeholder=" write here ...." required></textarea></td></tr>
	<tr>
		 <td><button > post</button></td>
		<td><input type="checkbox" name="hideme" value = "hide me"> <strong>hide me </strong></td>
		<td><input id="imginput" type = "file" name = "image" accept="image/*"></td>
    </tr>
</table>
</form>
</div>

</body>
</html>
