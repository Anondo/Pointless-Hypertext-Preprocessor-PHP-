<html>

<head>
    <title>User Information</title>
    <script src = "http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/user_handler.js"></script>
    <?php
    require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
    $admincontrol = new AdminController();
    if(!$admincontrol->isLogged())
    {
        header("Location: login.php?logreq=1");
    }

    ?>
</head>

<body>
   <?php
    $users = $admincontrol->getAllUsers();
    echo "<table border = '2'>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Profile Picture</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Operation</th>
         </tr>";
	while($user = $users->fetch_assoc())
	{
        echo "<tr id='{$user['user_id']}'>
                <td>{$user['fname']}</td>
                <td>{$user['lname']}</td>
                <td>{$user['age']}</td>
                <td>{$user['bdate']}</td>
                <td>{$user['username']}</td>
                <td>{$user['email']}</td>
                <td>{$user['password']}</td>
                <td>{$user['pro_pic']} Picture</td>
                <td>{$user['gender']}</td>
                <td>{$admincontrol->getRoleName($user['role'])}</td>
                <td><a href = 'user_edit.php?user_id={$user['user_id']}'><button>EDIT</button></a><button onclick='rmvUser({$user['user_id']})'>DELETE</button></td>
             </tr>";

	}
	echo "</table>";


   ?>
</body>

</html>
