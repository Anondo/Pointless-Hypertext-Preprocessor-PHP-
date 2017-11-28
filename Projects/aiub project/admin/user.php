<html>

<head>  <title>User Information</title></head>

<body>
   <?php
    
	require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
    $admincontrol = new AdminController();
    $users = $admincontrol->getAllUsers();
    echo "<ul>";
	
	while($user = $users->fetch_assoc())
	{
		echo "<li>{$user["user_id"]}-{$user["username"]}-{$user["email"]}-{$user["password"]}</li>";
		
	}
	echo "</ul>";
   
   
   ?>
</body>

</html>
